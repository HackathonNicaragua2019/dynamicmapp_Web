<?php

namespace App\Http\Controllers;

use App\Route;
use Illuminate\Http\Request;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use Grimzy\LaravelMysqlSpatial\Types\Geometry;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Route::paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $route=Route::make($request->all());
        
        if($request->has('start')) 
            $route->start=Geometry::fromJson($request->start);

        if($request->has('end')) 
            $route->end=Geometry::fromJson($request->end);

        if($request->has('route')) 
            $route->route=Geometry::fromJson($request->route);
        
        $route->save();
        return response()->json($route, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        $route->stops()->get();
        return $route;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $route)
    {
        $route->update($request->all());

        if($request->has('start')) 
            $route->start=Geometry::fromJson($request->start);

        if($request->has('end')) 
            $route->end=Geometry::fromJson($request->end);

        if($request->has('route')) 
            $route->route=Geometry::fromJson($request->route);
        
        $route->save();
        return response()->json($route, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $route->delete();
        return response()->json(null, 204);
    }
}
