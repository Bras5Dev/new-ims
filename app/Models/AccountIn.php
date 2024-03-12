<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountIn extends Model
{
    use HasFactory;

    protected $fillable = ['bank_id', 'user_id', 'amount', 'description', 'currency', 'date'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'bank_id' => 'nullable|numeric',
        'user_id' => 'required|numeric',
        'amount' => 'required|string',
        'description' => 'nullable|string',
        'currency' => 'nullable',
        'date' => 'required',
    ];
}
