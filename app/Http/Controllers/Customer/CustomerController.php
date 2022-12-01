<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified']);
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
