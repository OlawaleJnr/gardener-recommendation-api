<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\V1\AssignCustomerGardenerResource;
use App\Http\Resources\V1\CustomerResource;
use App\Models\AssignCustomerGardener;
use App\Models\Gardener;

class CustomerV1Controller extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $customers =  AssignCustomerGardener::with(['customer', 'gardener'])->get();
    return response()->json([
      "message" => "Customers record fetched",
      "data" => AssignCustomerGardenerResource::collection($customers)
    ], 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreCustomerRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreCustomerRequest $request)
  {
    // Create a new customer
    $customer = Customer::create($request->all());
    // fetch the customer country
    $country = $request->country_id;
    // fetch a random gardener that resides around the customer country/location
    $gardener = Gardener::inRandomOrder()->where('country_id', $country)->first();

    // store a relationship of the customer and gardener in a pivot-table
    $assignCustomer = new AssignCustomerGardener;
    $assignCustomer->customer_id = $customer->id;
    $assignCustomer->gardener_id = $gardener->id;
    $assignCustomer->save();

    return response()->json([
      "message" => "Customer created and assigned to a gardener",
      "data" => new CustomerResource($customer)
    ], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function show(Customer $customer)
  {
    if (AssignCustomerGardener::where('customer_id', $customer->id)->count() > 0) {
      $data = AssignCustomerGardener::with(['customer', 'gardener'])->where('customer_id', $customer->id)->get();
      return response()->json([
        "message" => "Customer record fetched",
        "data" => AssignCustomerGardenerResource::collection($data),
      ], 200);
    }else {
      return response()->json([
        "message" => "Resource not found"
      ], 404);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateCustomerRequest  $request
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateCustomerRequest $request, Customer $customer)
  {
    $customer->update($request->all());

    return response()->json([
      "message" => "Customer record updated",
      "data" => new CustomerResource($customer),
    ], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function destroy(Customer $customer)
  {
    //
  }
}
