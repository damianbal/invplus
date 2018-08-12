<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function invoices()
    {
        return $this->hasMany('App\Invoice', 'client_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getFullAddress()
    {
        return $this->address . ", " . $this->address_city . ", " . $this->address_state . ", " . $this->address_country . ", " . $this->address_zipcode;
    }
}
