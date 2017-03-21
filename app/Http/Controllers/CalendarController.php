<?php

namespace App\Http\Controllers;

use App\CarTask;
use App\RoomTask;
use App\CameraTask;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function getRoomArraySQL()
    {
        $roomtasks = RoomTask::with('user.roles','user.subroles','roomlist','roles')->get();
        return response()->json($roomtasks);
        //dd(json(array('roomtasks'=>$roomtasks,'cartasks'=>$cartasks)));
    }

    public function getCarArraySQL()
    {
        $cartasks = CarTask::with('user.roles','user.subroles','roles','subroles','alllists')->get();
        return response()->json($cartasks);

    }

    public function getCameraArraySQL()
    {
        $cameratasks = CameraTask::with('user.roles','user.subroles','roles','subroles')->get();
        return response()->json($cameratasks);

    }
}