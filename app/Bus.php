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
     * Valores calculados que se agregarán al arreglo del modelo
     *
     * @var array
     */
    protected $appends = ['position'];

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
        // Conección con la api traccar
        $client = new Client([
            'base_uri' => env('TRACCAR_HOST'),
            'auth' => [env('TRACCAR_EMAIL'), env('TRACCAR_PASSWORD')],
        ]);
        
        // Obteniendo listas de distpositivos GPS
        $response = $client->request('GET','api/devices');
        $response = json_decode($response->getBody()->getContents());
        $devices = Collect($response);
        
        // Si el bus tiene un dispositvo GPS se obtendrá su ultima ubicación
        $device = $devices->firstWhere('uniqueId',$this->device_id);
        if($device){
            $response = $client->request('GET','api/positions',['query'=>['id' => $device->positionId]]);
            $response = Collect(json_decode($response->getBody()->getContents()))->first();
            $position = new Point($response->latitude,$response->longitude);
            return $position;
        }
    }
}
