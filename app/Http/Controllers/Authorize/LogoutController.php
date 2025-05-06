<?php

namespace App\Http\Controllers\Authorize;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct(protected AuthService $authService) {}

    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $this->authService->logout($user);
        return redirect('/');
    }
}
