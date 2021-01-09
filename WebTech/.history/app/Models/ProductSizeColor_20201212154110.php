<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeColor extends Model
{
    use HasFactory;
    use sof

    protected $table = 'products_sizes_colors';

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }

    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
