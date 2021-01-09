<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_ordered',
        'date_to_arrive',
        'status_id',
        'transport_id',
        'payment_id',
        'delivery_info_id',
        'invoice_info_id',
        'session_id',
        'comment',
    ];

    public function suborders()
    {
        return $this->hasMany('App\Models\SubOrder');
    }

    public function invoiceinfo()
    {
        return $this->hasOne('App\Models\InvoiceInfo');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function deliveryinfo()
    {
        return $this->belongsTo('App\Models\DeliveryInfo');
    }

    public function payment()
    {
        return $this->belongsTo('App\Models\Payment');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function transport()
    {
        return $this->belongsTo('App\Models\Transport');
    }
}
