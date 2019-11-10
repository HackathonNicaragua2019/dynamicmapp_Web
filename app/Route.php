<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Route extends Model
{
    use SpatialTrait;
    
    protected $appends = ['stops'];

    protected $fillable=[
        'name',
        'description',
    ];
    
    protected $spatialFields=[
        'start',
        'end',
        'route',
    ];

    /**
     * Los buses que pertenecen a la ruta.
     */
    public function buses()
    {
        return $this->belongsToMany('App\Bus')->using('App\BusRoute');
    }

    /**
     * Los paradas que pertenecen a la ruta.
     */
    public function stops()
    {
        return $this->hasMany('App\Stop');
    }

    public function getStopsAttribute()
    {
        return $this->stops()->get();
    }
}
