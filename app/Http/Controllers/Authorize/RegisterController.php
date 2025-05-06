<?php

namespace App\Http\Controllers\Authorize;

use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct(protected AuthService $authService) {}

    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        unset($data['remember_me']);

        $user = User::create($data);

        $remember = $request->boolean('remember_me');

        auth()->login($user, $remember);

        $request->session()->regenerate();

        return redirect()->intended('/profile');
    }

}
