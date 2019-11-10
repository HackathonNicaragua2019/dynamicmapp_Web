<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use Grimzy\LaravelMysqlSpatial\Types\Point;

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
    
    /**
     * Obtiene la posición actualizada
     *
     * @return string
     */
    public function getPositionAttribute()
    {
        $client = new Client([
            'base_uri' => env('TRACCAR_HOST'),
            'auth' => [env('TRACCAR_EMAIL'), env('TRACCAR_PASSWORD')]
        ]);
        $response = $client->request('GET','api/positions');
        $devices = Collect(json_decode($response->getBody()->getContents()));
        $device = $devices->firstWhere('id',$this->device_id);
        if(isset($device)){
            $position = new Point($device->latitude,$device->longitude);
            return $position;
        }else{
            return response()->json('Dispositivo GPS no encontrado', 204);
        }
    }
}
