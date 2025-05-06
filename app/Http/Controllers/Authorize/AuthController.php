<?php

namespace App\Http\Controllers\Authorize;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct(protected AuthService $authService) {}

    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();
        $remember = $data['remember_me'] ?? false;
        return $this->authService->authenticate($data['email'], $data['password'], $remember)
            ? to_route('lk')
            : back()->withErrors(['email' => 'Неверный логин или пароль']);
    }
}
