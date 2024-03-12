<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_method',
        'bank_id',
        'amount',
    ];

   protected $hidden = [
        'created_at',
        'updated_at',
   ];

   public static $rules = [
        'payment_method' => 'required|in:cash,bank',
        'bank_id' => 'required_if:payment_method,bank|exists:banks,id',
        'amount' => 'required|numeric',
   ];

}
