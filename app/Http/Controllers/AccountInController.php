<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountInRequest;
use App\Models\AccountIn;
use Illuminate\Http\Request;

class AccountInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(AccountIn::all(), 'AccountIn retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccountInRequest $request)
    {
        $account = AccountIn::create($request->validated());

        return $this->sendResponse($account, 'AccountIn created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountIn $accountIn)
    {
        return $this->sendResponse($accountIn, 'AccountIn retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AccountInRequest $request, AccountIn $accountIn)
    {
        $accountIn->update($request->validated());

        return $this->sendResponse($accountIn, 'AccountIn updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountIn $accountIn)
    {
        $accountIn->delete();
        return  $this->sendSuccess('AccountIn deleted successfully.');
    }
}
