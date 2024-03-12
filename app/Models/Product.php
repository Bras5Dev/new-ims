<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'stock',
        'image',
        'quantity_alert',
        'unit',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'required|exists:brands,id',
        'name' => 'required|string',
        'stock' => 'required|integer',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        'quantity_alert' => 'integer',
        'unit' => 'required|string',
        'description' => 'required|string'
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
