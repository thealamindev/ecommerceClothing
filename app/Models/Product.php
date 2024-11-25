<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    function subcategory()
    {
        return $this->hasOne(Subcategory::class, 'id', 'subcategory_id');
    }
    function collection()
    {
        return $this->hasOne(Collection::class, 'id', 'collection_id')->withTrashed();
    }
    function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    function inventory()
    {
        return $this->hasMany(Inventory::class, 'product_id', 'id');
    }
    function product_tag()
    {
        return $this->hasMany(Product_tag::class, 'product_id', 'id');
    }
}
