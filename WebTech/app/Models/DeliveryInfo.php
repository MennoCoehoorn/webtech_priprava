<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryInfo extends Model
{
    use HasFactory;

    protected $table = 'delivery_infos';

    protected $fillable = [
        'name',
        'surname',
        'city_state',
        'postal-code',
        'address',
        'phone',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
}
