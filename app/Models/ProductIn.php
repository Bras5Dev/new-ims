<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'date',
        'purchase_price',
        'stock',
        'description',
    ];

   protected $hidden = [
        'created_at',
        'updated_at',
   ];

   public static $rules = [
        'product_id' => 'required',
        'user_id' => 'required',
        'date' => 'required',
        'purchase_price' => 'required',
        'stock' => 'required',
        'description' => 'nullable',
   ];

}
