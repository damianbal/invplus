<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function invoice() 
    {
        return $this->belongsTo('App\Invoice', 'invoice_id');
    }
}
