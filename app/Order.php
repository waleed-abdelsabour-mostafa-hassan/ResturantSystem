<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total', 'statusl', 'cashIn','payment','change','customer_id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
