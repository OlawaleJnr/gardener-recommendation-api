<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;

class CountryV1Controller extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreCountryRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Country $country)
  {
    return $country->gardener;
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Country  $country
   * @return \Illuminate\Http\Response
   */
  public function show(Country $country)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateCountryRequest  $request
   * @param  \App\Models\Country  $country
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateCountryRequest $request, Country $country)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Country  $country
   * @return \Illuminate\Http\Response
   */
  public function destroy(Country $country)
  {
    //
  }
}
