<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'account_number',
        'account_name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'name' => 'required|string',
        'address' => 'required|string',
        'account_number' => 'required|string',
        'account_name' => 'required|string',
    ];

}
