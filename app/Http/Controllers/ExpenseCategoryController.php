<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApiController;
use App\Models\ExpenseCategory;
use App\Http\Requests\StoreExpenseCategoryRequest;
use App\Http\Requests\UpdateExpenseCategoryRequest;

class ExpenseCategoryController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(ExpenseCategory::all(), 'Expense categories retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseCategoryRequest $request)
    {
        ExpenseCategory::create($request->validated());

        return $this->sendSuccess('Expense category created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        return $this->sendResponse($expenseCategory, 'Expense category retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExpenseCategoryRequest $request, ExpenseCategory $expenseCategory)
    {
        $expenseCategory->update($request->validated());

        return $this->sendSuccess('Expense category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseCategory $expenseCategory)
    {
        $expenseCategory->delete();

        return $this->sendSuccess('Expense category deleted successfully.');
    }
}
