<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Stop extends Model
{
    use SpatialTrait;
    
    protected $fillable=[
        'position',
    ];

    protected $spatialFields=[
        'position',
    ];
}
