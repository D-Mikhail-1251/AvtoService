<?php

namespace App\Observers;

use App\Models\Master;
use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
       $allOrders = Order::get()->count();
        $order->count = $allOrders;
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        if ($order->master_id === null) return;

        if ($order->isDirty('master_id') || $order->isDirty('status')) {
            $master = Master::find($order->master_id);
            if (!$master) return;

            $orders = Order::where('master_id', $order->master_id)->get();

            $master->count_of_orders = $orders->count();
            $master->active_orders = $orders->where('status', 'В работе')->count();

            $master->save();
        }

        if ($order->isDirty('status') && $order->status === 'Завершён') {
            $master = Master::find($order->master_id);
            if (!$master) return;

            if ($order->price !== null) {
                $masterCommission = $order->price * 0.30;


                $master->salary += $masterCommission;
                $master->save();
            }
        }
    }


    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
