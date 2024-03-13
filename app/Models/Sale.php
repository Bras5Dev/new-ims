<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'product_id',
        'selling_price',
        'stock',
        'description',
    ];

   public static $rules = [
        'date' => 'required',
        'user_id' => 'required',
        'product_id' => 'required',
        'selling_price' => 'required',
        'stock' => 'required',
        'description' => 'nullable',
    ];

    public static $update_rules = [
        'date' => 'required',
        'user_id' => 'required',
        'product_id' => 'required',
        'selling_price' => 'required',
        'stock' => 'required',
        'description' => 'nullable',
    ];

    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

}
