<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'date',
        'user_id',
        'bill',
        'bank_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public static $rules =  [
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'bill' => 'sometimes|max:4096',
            'bank_name' => 'sometimes|string'
        ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
