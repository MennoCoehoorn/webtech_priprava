<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function productsizecolor()
    {
        return $this->hasMany('App\Models\ProductSizeColor');
    }

    public function picture()
    {
        return $this->hasMany('App\Models\Picture');
    }
}
