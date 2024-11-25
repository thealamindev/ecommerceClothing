<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_tag extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    function tag()
    {
        return $this->hasOne(Tag::class, 'id', 'tag_id');
    }
}
