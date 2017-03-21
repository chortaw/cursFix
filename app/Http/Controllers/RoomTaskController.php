<?php

namespace App\Http\Controllers;
use App\Http\Requests\RoomRequest;
use Carbon\Carbon;
use App\RoomTask;
use App\Room;
use App\User;
use App\Devices;
use Illuminate\Support\Facades\Auth;
use App;
use App\CarTask;
use DB;
class RoomTaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create','edit']]);
    }

    public function index()
    {
        $roomtasks = RoomTask::orderBy('created_at', 'dsc')->get();
        return view('roomtasks.index', compact('roomtasks'));
    }


    public function show(RoomTask $roomtasks)
    { //Find id of $roomtasks wildcard
        $roomtasks = RoomTask::all();
        return view('roomtasks.show', compact('roomtasks'));

    }

    public function create()
    {
        return view('roomtasks.create');

    }

    public function store(RoomRequest $request)
    {
        $roomtasks = RoomTask::all();
        $devices = Devices::pluck('name','id');
        $cartasks = CarTask::all();
        $roomlists = Room::all();

        $room =request("room_id");
        $d1 =request('start_at');
        $d2 =request('finish_at');

        ///////between booked/////
        $db = DB::table('room_tasks')
             ->where('room_id', '=', $room)
             ->where('start_at', '<=', $d1)
             ->where('finish_at', '>=', $d2)->first();
        //////Before start_at to less than finish at////
          $db2 = DB::table('room_tasks')
               ->where('room_id', '=', $room)
               ->where('start_at', '>=', $d1)
               ->where('start_at', '<=', $d2)
               ->where('finish_at', '>=', $d2)->first();
        ////// Between booked to after or equal to finish_at
          $db3 = DB::table('room_tasks')
               ->where('room_id', '=', $room)
               ->where('start_at', '<=', $d1)
               ->where('finish_at', '>=', $d1)
               ->where('finish_at', '<=', $d2)->first();
        ////// Before start_at to after finish_at
           $db4 = DB::table('room_tasks')
               ->where('room_id', '=', $room)
               ->where('start_at', '>=', $d1)
               ->where('finish_at', '<=', $d2)
               ->first();

            if($db != null)
            {
                session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม่1');
                  if(Auth::check() && Auth::user()->role==10)
                    {
                    return view('layouts/sahauserhome', compact('roomtasks','devices','cartasks','roomlists'));
                    }
                return view('/datatables/show', compact('roomtasks','devices','cartasks'));
            }
            else if ($db2 != null){
                session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม2');
                if(Auth::check() && Auth::user()->role==10)
                {
                    return view('layouts/sahauserhome', compact('roomtasks','devices','cartasks','roomlists'));
                }
                return view('/home', compact('roomtasks','devices','cartasks'));

            }
            else if ($db3 != null){
                session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม่3');
                if(Auth::check() && Auth::user()->role==10)
                {
                    return view('layouts/sahauserhome', compact('roomtasks','devices','cartasks','roomlists'));
                }
                return view('/home', compact('roomtasks','devices','cartasks'));
            }
            else if ($db4 != null){
                session()->flash('messagedanger','ห้องไม่ว่างในช่วเวลานี้ กรุณาเลือกช่วงเวลาใหม่4');
                if(Auth::check() && Auth::user()->role==10)
                {
                    return view('layouts/sahauserhome', compact('roomtasks','devices','cartasks','roomlists'));
                }
                return view('/home', compact('roomtasks','devices','cartasks'));
            }
            else
            {

                $current = Carbon::parse(request('start_at'));
                $dt      = Carbon::parse(request('finish_at'));
                $hours = $current->diffInHours($dt);



                $roomtasks = RoomTask::create([
                    'room_id'=>request('room_id'),
                    'start_at'=>request('start_at'),
                    'finish_at'=>request('finish_at'),
                    'topic'=>request('topic'),
                    'capacity'=>request('capacity'),
                    'description'=>request('description'),
                    'user_id'=>auth()->id(),
                    'hours'=> $hours,
//                    'role'=>Auth::user()->role,
//                    'sub_role'=>Auth::user()->sub_role,
                ]);

                $deviceIds = $request->input('devices');
                $roomtasks->devices()->attach($deviceIds);

                session()->flash('message','จองห้องสำเร็จ โปรดรอการอณุมัติ'); //FLASH

                if(Auth::check() && Auth::user()->role==10)
                {
                    return redirect('datatables/showsaha');
                }

                    return redirect('datatables/show');

            }

    }


    public function edit($id)
    {

        $roomtasks = RoomTask::find($id);
        if(Auth::user()->id === $roomtasks->user_id) {
            $devices = Devices::pluck('name','id');

            return view('roomtasks.edit',compact('roomtasks','devices'));
        }
        else
        {
            return redirect('datatables/show');
        }



    }



    public function update(RoomRequest $request,$id){
        $roomtasks = RoomTask::findOrFail($id);
        $roomtasks->update($request->all());
            return redirect('datatables/show');
        }


    public function destroy($id)
    {
        $roomtasks= RoomTask::findOrFail($id);
        $roomtasks->delete();

        return redirect()->back();
    }




}
