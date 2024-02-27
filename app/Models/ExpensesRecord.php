<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'expense_id',
        'amount',
        'date',
        'bill',
        'bank_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static $rules =  [
            'user_id' => 'required|exists:users,id',
            'expense_id' => 'required|exists:expense_categories,id',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'bill' => 'sometimes|max:4096',
            'bank_name' => 'sometimes|string'
        ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function expenseCategories()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
