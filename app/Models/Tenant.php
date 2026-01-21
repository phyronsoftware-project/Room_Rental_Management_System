<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = 'tenants';
    protected $primaryKey = 'tenant_id';
    public $timestamps = false;

    protected $fillable = [
        'room_id',
        'full_name',
        'email',
        'password',
        'phone_number',
        'age',
        'start_date',
        'end_date',
        'status',
        'payment_term',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    public function room()
    {
        return $this->belongsTo(\App\Models\Room::class, 'room_id', 'room_id');
    }
}
