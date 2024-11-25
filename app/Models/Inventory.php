<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    function color()
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }
    function size()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }
}
