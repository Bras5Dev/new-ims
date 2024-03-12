<?php

namespace App\Http\Controllers;

use App\Models\AccountOut;
use App\Http\Requests\StoreAccountOutRequest;
use App\Http\Requests\UpdateAccountOutRequest;

class AccountOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(AccountOut::all(), 'AccountOut retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountOutRequest $request)
    {
        $account = AccountOut::create($request->validated());

        return $this->sendResponse($account, 'AccountOut created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountOut $accountOut)
    {
        return $this->sendResponse($accountOut, 'AccountOut retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountOutRequest $request, AccountOut $accountOut)
    {
        $accountOut->update($request->validated());

        return $this->sendResponse($accountOut, 'AccountOut updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountOut $accountOut)
    {
        $accountOut->delete();
        return  $this->sendSuccess('AccountOut deleted successfully.');
    }
}
