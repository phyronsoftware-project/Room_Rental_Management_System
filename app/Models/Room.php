<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'room_id';
    public $timestamps = false;

    protected $fillable = [
        'property_id',
        'room_number',
        'floor',
        'price',
        'status',
    ];

    public function tenants()
    {
        return $this->hasMany(Tenant::class, 'room_id', 'room_id');
    }
}
