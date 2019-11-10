<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Route extends Model
{
    use SpatialTrait;
    
    protected $fillable=[
        'name',
        'description',
        'start',
        'end',
        'route',
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
}
