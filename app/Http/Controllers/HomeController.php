<?php

namespace App\Http\Controllers;

use App\Food;
use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $user = Auth::user();
        /**
         * @var $user /User
         */
      $data['feedings'] = $user->recentFeedings();
      $data['location'] = $user->location();
      $data['foods'] = Food::all()->keyBy('id');
      $data['pending'] = Task::whereUserId($user->id)->get();


    return view('home',['data'=>$data]);
  }
}
