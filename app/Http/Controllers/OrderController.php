<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Request as ModelsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Log;
use Validator;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function action(Request $request)
    {
        $requestId = ModelsRequest::find($request->id);

        if (!$requestId) {
            return back()->with('error', 'Заявка не найдена.');
        }

        if ($request->input('action') === 'accept') {
            $data = $request->all();
            $data['uuid'] = Str::uuid();
            Order::create($data);
            $requestId->delete();
            return to_route('lk')->with('success', 'Заказ принят.');
        }

        if ($request->input('action') === 'reject') {
            $requestId->delete();
            return to_route('requests')->with('success', 'Заявка отклонена.');
        }

        return back()->with('error', 'Некорректное действие.');
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $orders = Order::with('master')->get();

        $orders->each(function ($order) {
            $order['master_name'] = $order->master;
        });

        return view('pages.orders', ['orders' => $orders, 'title' => 'Заказы']);
    }


    public function showOrder(Request $request)
    {
        $order = Order::where('uuid', $request->uuid)->first();
        $title = 'Заказ #'.$order->id;
        return view('pages.order', compact('order', 'title'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::with('master')->findOrFail($id);
        $masters = Master::all();
        return view('pages.edit_order', ['order' => $order, 'title' => 'Изменение заказа', 'masters' => $masters]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'master_id' => 'nullable|integer|exists:masters,id',
                'full_name_client' => 'required|string|max:255',
                'mark' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'state_number' => 'required|string|max:20',
                'region' => 'required|string|max:3',
                'price' => 'nullable|numeric|min:0',
                'description' => 'nullable|string',
                'status' => 'required|in:Формируется,Начат,В работе,Выполнен,Отменен',
                'EndTime' => 'sometimes',
                'image' => 'nullable|url',
                'remove_image' => 'nullable|boolean'
            ], [
                'full_name_client.required' => 'Поле ФИО клиента обязательно для заполнения',
                'mark.required' => 'Поле Марка обязательно для заполнения',
                'model.required' => 'Поле Модель обязательно для заполнения',
                'state_number.required' => 'Поле Гос. номер обязательно для заполнения',
                'region.required' => 'Поле Регион обязательно для заполнения',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $order = Order::findOrFail($id);
            $data = $validator->validated();

            if ($request->has('remove_image') && $order->image) {
                $order->image = null;
                $data['image'] = null;
            }
            if ($request->has('image')) {
                $order->image = $request->image;
            }
            if ($request->has('master_id')) {
                $id = $request->master_id;
                $master = Master::findOrFail($id);
                $fullName = $master->name . ' ' . $master->last_name;
                $order->master = $fullName;
                $order->master_id = $master->id;
                $order->save();
            }

            $order->update($data);
            $order->save();
            return redirect()->route('orders.index')
                ->with('success', 'Заказ #' . $order->id . ' успешно обновлен!');
        } catch (\Exception $e) {
            Log::error('Ошибка при обновлении заказа: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Произошла ошибка при обновлении заказа. Пожалуйста, попробуйте позже.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::find($id)->delete();
    }

    /**
     * Personal task for masters
     */
    public function myTasks()
    {
        $title = 'Мои задачи';
        $master = Master::where('user_id', Auth::user()->id)->first();
        $orders = Order::where('master_id', $master->id)->orderByDesc('EndTime')->get();
        return view( 'pages.my_tasks', compact('orders', 'title', 'master'));
    }
}
