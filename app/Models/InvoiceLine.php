<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    protected $fillable = ['title', 'description', 'unit_price', 'amount', 'vat_rate', 'invoice_id'];

    public function invoice()
    {
        return $this->belongsTo(\App\Models\Invoice::class);
    }
}
