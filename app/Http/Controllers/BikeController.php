<?php

namespace App\Http\Controllers;

use App\Bike;
use Illuminate\Http\Request;
use App\Http\Resources\BikeLocation as BikeLocationResource;

class BikeController extends Controller
{
    public function nearby(Request $request)
    {
      $latitude = $request->input('latitude');
      $longitude = $request->input('longitude');
      $radius = $request->input('radius');
      $nearby_bikes = Bike::nearby($latitude, $longitude, $radius)->get();
      return BikeLocationResource::collection($nearby_bikes);
    }

    public function inbox(Bike $bike)
    {
      return new BikeLocationResource($bike);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BikeLocationResource::collection(Bike::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show(Bike $bike)
    {
        return new BikeLocationResource($bike);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function edit(Bike $bike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bike $bike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bike $bike)
    {
        //
    }
}
