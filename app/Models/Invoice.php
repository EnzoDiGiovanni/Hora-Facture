<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class Invoice extends Model
{
    protected $fillable = ['name', 'start', 'end', 'notes', 'user_id', 'client_id'];

    public function lines()
    {
        return $this->hasMany(\App\Models\InvoiceLine::class);
    }

    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function scopeOwned($query)
    {
        return $query->where('user_id', FacadesAuth::id());
    }
}
