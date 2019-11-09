<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Route extends Model
{
    use SpatialTrait;
    
    protected $fillable=[
        'start',
        'end',
        'route',
    ];
    protected $spatialFields=[
        'start',
        'end',
        'route',
    ];
}
