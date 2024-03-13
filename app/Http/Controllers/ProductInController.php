<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApiController;
use App\Models\ProductIn;
use App\Http\Requests\StoreProductInRequest;
use App\Http\Requests\UpdateProductInRequest;
use App\Models\Product;

class ProductInController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productIns = ProductIn::latest()->get();

        return $this->sendResponse($productIns, 'ProductIns retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductInRequest $request)
    {
        $productIn = ProductIn::create($request->validated());

        $product = Product::find($productIn->product_id);
        $product->stock = $product->stock + $productIn->stock;
        $product->save();

        return $this->sendResponse($productIn, 'ProductIn created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductIn $productIn)
    {
        return $this->sendResponse($productIn, 'ProductIn retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductInRequest $request, ProductIn $productIn)
    {
        $productIn->update($request->validated());

        return $this->sendResponse($productIn, 'ProductIn updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductIn $productIn)
    {
        $productIn->delete();

        return $this->sendResponse($productIn, 'ProductIn deleted successfully.');
    }
}
