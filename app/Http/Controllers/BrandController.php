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
            'slug' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4056',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = $request->name + '_' + rand(1000, 9999);
        $brand->logo = ($this->storeFile($request->file('logo'), 'brand')) ?? 'xdd';
        $brand->save();

        return $this->sendSuccess('Brand created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4056',
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
        $this->deleteFile($brand->logo, 'brand');
        $brand->delete();

        return $this->sendSuccess('Brand deleted successfully.');
    }
}
