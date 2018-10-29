<?php

namespace App\Http\Controllers;

use App\Feeding;
use App\Http\Requests\FeedingRequest;
use App\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedingController extends Controller
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
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }


  /**
   * @param FeedingRequest $request
   */
  public function store(FeedingRequest $request)
  {
    $date = new Carbon($request->date);
    $user = Auth::user();
    $feeding = new Feeding();
    $feeding->quantity = $request->quantity;
    $feeding->duck_count = $request->duck_count;
    $feeding->food_id = $request->food_id;
    $feeding->user_id = $user->id;
    $feeding->time = $date->toDateTimeString();

    if (!empty($request->location_id)) {
      $feeding->location_id = $request->location_id;
    } else {
      $locationData = $request->location;
      $location = new Location();
      $location->address = $locationData['name'] . ' ' . $locationData['locality'] . ' ' . $locationData['country'];
      $location->latitude = $locationData['latitude'];
      $location->longitude = $locationData['longitude'];
      $location->save();
      $feeding->location_id = $location->id;
    }

    $result = $feeding->save();
    if ($request->ajax()) {
      return response()->json( $user->recentFeedings(true)[0]);
    }


  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Feeding $feeding
   *
   * @return \Illuminate\Http\Response
   */
  public function show(Feeding $feeding)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Feeding $feeding
   *
   * @return \Illuminate\Http\Response
   */
  public function edit(Feeding $feeding)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \App\Feeding             $feeding
   *
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Feeding $feeding)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Feeding $feeding
   *
   * @return \Illuminate\Http\Response
   */
  public function destroy(Feeding $feeding)
  {
    //
  }
}
