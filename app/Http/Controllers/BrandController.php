<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApiController;
use App\Models\Brand;
use App\Trait\storeFile;
use Illuminate\Http\Request;

class BrandController extends BaseApiController
{
    use storeFile;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(Brand::all(), 'Brands retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4056',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->logo = $this->storeFile($request->file('logo'), 'brand') ?? null;
        $brand->save();
        $brand->slug = $request->name . '-' . $brand->id;

        return $this->sendSuccess('Brand created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4056',
        ]);

        $brand->name = $request->name;

        if ($request->hasFile('logo')) {
            $this->deleteFile($brand->logo, 'brand');
            $brand->logo = $this->storeFile($request->file('logo'), 'brand');
        }
        $brand->save();

        return $this->sendSuccess('Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->logo != null){
         $this->deleteFile($brand->logo, 'brand');
        }
        $brand->delete();

        return $this->sendSuccess('Brand deleted successfully.');
    }
}
