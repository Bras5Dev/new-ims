<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;

class SaleController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sale = Sale::latest()->get();

        return $this->sendResponse($sale, 'Sales retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        Sale::create($request->validated());

        return $this->sendSuccess('Sale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        return $this->sendResponse($sale, 'Sale retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale->update($request->validated());

        return $this->sendSuccess('Sale updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();

        return $this->sendSuccess('Sale deleted successfully.');
    }
}
