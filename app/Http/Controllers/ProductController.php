<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Trait\storeFile;
use Illuminate\Http\Request;

class ProductController extends BaseApiController
{
    use storeFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(Product::with('category','brand')->latest()->get() ,'Products retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
       $product = Product::create($request->validated());

       $product->image = $this->storeFile($request->file('image'),'product');
       $product->save();

        return $this->sendSuccess('Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->sendResponse($product,'Product retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        if($request->hasFile('image')){

            $this->deleteFile($product->image, 'product');
            $product->image = $this->storeFile($request->file('image'),'product');
            $product->save();
        }

        return $this->sendSuccess('Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->deleteFile($product->image, 'product');
        $product->delete();

        return $this->sendSuccess('Product deleted successfully.');
    }
}
