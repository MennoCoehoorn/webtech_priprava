<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSizeColor extends Model
{
    use HasFactory;
    use SoftDeletes;

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
