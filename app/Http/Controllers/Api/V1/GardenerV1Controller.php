<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Gardener;
use App\Http\Requests\StoreGardenerRequest;
use App\Http\Requests\UpdateGardenerRequest;
use App\Http\Resources\V1\GardenerCollection;
use App\Http\Resources\V1\GardenerResource;
use App\Models\Country;

class GardenerV1Controller extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $gardeners = Gardener::all();
    return response()->json([
      "message" => "Gardeners record fetched",
      "data" => GardenerResource::collection($gardeners),
    ], 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreGardenerRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreGardenerRequest $request)
  {
    $gardener = Gardener::create($request->all());
    return response()->json([
      "message" => "Gardener record created",
      "data" => new GardenerResource($gardener),
    ], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Gardener  $gardener
   * @return \Illuminate\Http\Response
   */
  public function show(Gardener $gardener)
  {
    return response()->json([
      "message" => "Gardener record fetched",
      "data" => new GardenerResource($gardener),
    ], 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateGardenerRequest  $request
   * @param  \App\Models\Gardener  $gardener
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateGardenerRequest $request, Gardener $gardener)
  {
    $gardener->update($request->all());

    return response()->json([
      "message" => "Gardener record updated",
      "data" => new GardenerResource($gardener),
    ], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Gardener  $gardener
   * @return \Illuminate\Http\Response
   */
  public function destroy(Gardener $gardener)
  {
    //
  }

  /**
   *  the specified resource from storage.
   *
   * @param  \App\Models\Gardener  $gardener
   * @return \Illuminate\Http\Response
   */
  public function gardeners(Country $country) {
    $gardeners = Gardener::where('country_id', $country->id)->get();
    return $gardeners;
    return new GardenerCollection($gardeners);
  }
}
