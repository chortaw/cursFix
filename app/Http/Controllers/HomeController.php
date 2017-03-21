<?php

namespace App\Http\Controllers;

use App\CameraTask;
use App\Car;
use App\RoomTask;
use Illuminate\Http\Request;
use App\Devices;
use App\Room;
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
        $devices = Devices::pluck('name','id');
        $roomtasks = RoomTask::all();
        $roomlists = Room::all();
        $carlists = Car::all();


        if( Auth::check() && Auth::user()->role== 1 ) {
            return view('layouts.adminhome', compact('roomlists', 'devices','carlists','roomtasks'));
        }
        else if (Auth::check() && Auth::user()->role >1 && Auth::user()->role <=6)
        {
            return view('layouts.userhome', compact('roomlists', 'devices','carlists','roomtasks'));
        }
        else if (Auth::check() && Auth::user()->role==7)
        {
            return view('layouts.driverhome', compact('roomlists', 'devices','carlists','roomtasks'));
        }
        else if(Auth::check() && Auth::user()->role==8)
        {
            return view('layouts.equserhome', compact('roomlists', 'devices','carlists','roomtasks'));
        }
        else if (Auth::check() && Auth::user()->role==9)
        {
            return view('datatables.showkeeper', compact('roomlists', 'devices','carlists','roomtasks'));
        }
        else if(Auth::check() && Auth::user()->role==10)
        {
            return view('layouts.sahauserhome', compact('roomlists', 'devices','carlists','roomtasks'));
        }

    }
}
