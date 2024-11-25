<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->latest();
    }
    function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'category_id', 'id')->latest();
    }
    function product_count($id)
    {
        return Product::where('category_id', $id)->count();
    }
}
