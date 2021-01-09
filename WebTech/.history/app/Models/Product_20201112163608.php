<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function productsizecolor()
    {
        return $this->hasMany('App\Models\ProductSizeColor');
    }

    public function picture()
    {
        return $this->hasMany('App\Models\Picture');
    }
}
