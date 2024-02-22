<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'sale_date',
        'customer_id',
        'product_id',
        'status',
        'payment',
        'total_payment',
        'payment_status',
    ];

   public static $rules = [
        'invoice_number' => 'required',
        'sale_date' => 'required',
        'customer_id' => 'required',
        'product_id' => 'required',
        'status' => 'required',
        'payment' => 'required',
        'total_payment' => 'required',
        'payment_status' => 'required',
    ];

    public static $update_rules = [
        'invoice_number' => 'required',
        'sale_date' => 'required',
        'customer_id' => 'required',
        'product_id' => 'required',
        'status' => 'required',
        'payment' => 'required',
        'total_payment' => 'required',
        'payment_status' => 'required',
    ];

    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

}
