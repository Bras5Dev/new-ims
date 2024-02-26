<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo'];
    protected $appends = ['logo_url'];

    protected $hidden = ['created_at', 'updated_at'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo
            ? asset('storage/category/' . $this->logo)
            : asset('storage/category/no-image.png');
    }
}
