<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request;

class AdminController extends Controller
{
    public function getRequests()
    {
        $requests = Request::all();

        return view('admin.requests', ['requests' => $requests, 'title' => 'Заявки']);
    }
}
