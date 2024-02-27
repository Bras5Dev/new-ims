<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\BankRequest;
use App\Models\Bank;

class BankController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(Bank::all(), 'Banks retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankRequest $request)
    {
        $bank = Bank::create($request->validated());

        return $this->sendResponse($bank, 'Bank created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        return $this->sendResponse($bank, 'Bank retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankRequest $request, Bank $bank)
    {
        $bank->update($request->validated());

        return $this->sendResponse($bank, 'Bank updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();

        return  $this->sendSuccess('Bank deleted successfully.');
    }
}
