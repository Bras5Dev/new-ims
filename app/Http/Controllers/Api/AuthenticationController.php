<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|numeric',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'tax_number' => 'required|string',
            'billing_address' => 'required|string',
            'shipping_address' => 'required|string',
            'password' => 'required|min_length:6',
        ]);
    }
}
