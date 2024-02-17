<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    public function index()
    {
        return Customer::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'tax_number' => 'required',
            'billing_address' => 'required',
            'shipping_address' => 'required',
            'status' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->tax_number = $request->tax_number;
        $customer->billing_address = $request->billing_address;
        $customer->shipping_address = $request->shipping_address;
        $customer->status = $request->status;
        $customer->save();

        return $this->sendSuccess('Successfully created a new customer ' . $customer->name);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'tax_number' => 'required',
            'billing_address' => 'required',
            'shipping_address' => 'required',
            'status' => 'required',
        ]);

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->tax_number = $request->tax_number;
        $customer->billing_address = $request->billing_address;
        $customer->shipping_address = $request->shipping_address;
        $customer->status = $request->status;
        $customer->save();

        return $this->sendSuccess('Successfully updated ' . $customer->name . ' customer');
    }
    public function delete($id)
    {

        $customer = Customer::find($id);
        $customer->delete();

        return $this->sendSuccess('Successfully deleted ' . $customer->name . ' customer');
    }
}
