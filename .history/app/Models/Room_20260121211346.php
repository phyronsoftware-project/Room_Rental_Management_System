<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function tenants()
    {
        return $this->hasMany(\App\Models\Tenant::class, 'room_id', 'room_id');
    }
}
