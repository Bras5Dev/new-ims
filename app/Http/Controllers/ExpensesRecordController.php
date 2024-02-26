<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\ExpensesRecordRequest;
use App\Models\ExpensesRecord;
use App\Trait\storeFile;

class ExpensesRecordController extends BaseApiController
{
    use storeFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->sendResponse(ExpensesRecord::all(), 'Expenses records retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpensesRecordRequest $request)
    {
        $expenses_record = ExpensesRecord::create($request->validated());
        $expenses_record->bill = $request->hasFile('bill')
                                ? $this->storeFile($request->file('bill'), 'ExpensesRecord')
                                : null;
        $expenses_record->save();

        return $this->sendResponse($expenses_record, 'Expenses record created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpensesRecord $expensesRecord)
    {
        return $this->sendResponse($expensesRecord, 'Expenses record retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpensesRecordRequest $request, ExpensesRecord $expensesRecord)
    {
        $expensesRecord->update($request->validated());

        if($request->hasFile('bill')){
            $this->deleteFile($expensesRecord->bill, 'ExpensesRecord');
            $expensesRecord->bill = $this->storeFile($request->file('bill'), 'ExpensesRecord');
        }
        $expensesRecord->save();

        return $this->sendResponse($expensesRecord, 'Expenses record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpensesRecord $expensesRecord)
    {
        if ($expensesRecord->bill) {
            $this->deleteFile($expensesRecord->bill, 'ExpensesRecord');
        }
        $expensesRecord->delete();

        return $this->sendSuccess('Expenses record deleted successfully');
    }
}
