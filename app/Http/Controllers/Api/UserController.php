<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Models\{Customer, User, Supplier};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $user = User::create($request->validated());
        //        $password = Str::random(8);

        $password = 'randomvalue';

        $user->password = Hash::make($password);

        $user->save();


        return $this->sendSuccess('Successfully created a new customer ' . $user->name);
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

        if ($request->type == $user->type) {
            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->email = $request->email;
            $user->tax_number = $request->tax_number;
            $user->billing_address = $request->billing_address;
            $user->shipping_address = $request->shipping_address;
            $user->status = $request->status;
            $user->save();
        }

        return $this->sendSuccess('Successfully updated ' . $user->name . $user->type);
    }

    public function delete(User $user)
    {
        $user->delete();

        return $this->sendSuccess('Successfully deleted');
    }
}
