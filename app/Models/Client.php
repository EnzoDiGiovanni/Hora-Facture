<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Client extends Model
{
    protected $fillable = ['bussiness_name', 'email', 'ical_url', 'user_id', 'hourly_rate'];

    public function scopeOwned($query)
    {
        return $query->where('user_id', Auth::id());
    }
}
