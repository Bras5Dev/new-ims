<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Models\{Customer,User,Supplier};
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    public function index()
    {
        if (request()->type == 'Supplier') {
            return Supplier::all();
        }

        return Customer::all();
    }
    public function store(UserRequest $request)
    {
       User::create($request->validated());

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
        $user = User::find($id);

        if($request->type == $user->type) {
            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->email = $request->email;
            $user->tax_number = $request->tax_number;
            $user->billing_address = $request->billing_address;
            $user->shipping_address = $request->shipping_address;
            $user->status = $request->status;
            $user->save();
        }

        return $this->sendSuccess('Successfully updated ' . $user->name . $type);
    }

    public function delete(User $user)
    {
        $user->delete();

        return $this->sendSuccess('Successfully deleted');
    }
}