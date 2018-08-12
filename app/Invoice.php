<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Returns all items which belong to that invoice
     *
     * @return void
     */
    public function invoiceItems() 
    {
        return $this->hasMany('App\InvoiceItem', 'invoice_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }
}
