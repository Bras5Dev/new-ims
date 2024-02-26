<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApiController;
use App\Models\Category;
use App\Trait\storeFile;
use Illuminate\Http\Request;

class CategoryController extends BaseApiController
{
    use storeFile;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(Category::all(), 'Categories retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4056'
        ]);

        if ($request->has('logo')) {
            $logo =   $this->storeFile($request->file('logo'), 'category');
        }
        $category = new Category();
        $category->name = $request->name;
        $category->logo = $logo ?? null;
        $category->save();

        return $this->sendSuccess('Category created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:4056'
        ]);

        $category->name = $request->name;

        if ($request->hasFile('logo')) {
            $this->deleteFile($category->logo, 'category');
            $category->logo = $this->storeFile($request->file('logo'), 'category');
        }
        $category->save();

        return $this->sendSuccess('Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->deleteFile($category->logo, 'category');
        $category->delete();

        return $this->sendSuccess('Category deleted successfully.');
    }
}
