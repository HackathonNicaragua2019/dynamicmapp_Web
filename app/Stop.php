<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class Stop extends Model
{
    use SpatialTrait;
    
    protected $fillable=[
        'position',
        'route_id',
    ];

    protected $spatialFields=[
        'position',
    ];

    /**
     * Obtiene la ruta que pertence a la parada.
     */
    public function route()
    {
        return $this->belongsTo('App\Route');
    }
}
