<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable=[
        'name',
        'license_plate',
        'device_id',
    ];

    /**
     * Las rutas que pertenecen al autobús.
     */
    public function routes()
    {
        return $this->belongsToMany('App\Route')->using('App\BusRoute');
    }
}
