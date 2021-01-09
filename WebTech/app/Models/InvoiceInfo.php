<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceInfo extends Model
{
    use HasFactory;

    protected $table = 'invoice_infos';

    protected $fillable = [
        'name',
        'surname',
        'city_state',
        'postal-code',
        'address',
        'phone',
        'email',
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
