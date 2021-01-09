<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubOrder extends Model
{
    use HasFactory;

    protected $table = 'sub_orders';

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
    
    public function productsizecolor()
    {
        return $this->belongsTo('App\Models\ProductSizeColor');
    }
}
