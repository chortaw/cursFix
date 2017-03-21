<?php

namespace App\Http\Controllers;

use App\CameraTask;
use App\Role;
use App\SubRole;
use Illuminate\Http\Request;
use Datatables;
use App\RoomTask;
use DB;
use App\User;
use Auth;
use App\CarTask;


class DatatablesController extends Controller
{
    /**
     * Check Auth
     *
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['getbyId', 'show','getIndex']]);
        $this->middleware('admin', ['only' => [
            'ToggleStatus'
        ]]);
    }

    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {

        $cartasks = CarTask::all( );
        $roomtasks = RoomTask::all();
        $users = User::all();
        $cameratasks = CameraTask::all();

        if (request()->ajax()) {
            return Datatables::of(RoomTask::query())->make(true);
        }
        else if(Auth::check() && Auth::user()->role == 7) //คนขับรถ 7
        {
            return view('datatables.showdriver', compact('roomtasks','cartasks','users','cameratasks'));
        }
        else if(Auth::check() && Auth::user()->role == 8) //เจ้าหน้าที่โสต 8
          {
            return view('datatables.showeq', compact('roomtasks','cartasks','users','cameratasks'));
          }
        else if(Auth::check() && Auth::user()->role == 9) //เจ้าหน้าที่โสต 9
        {
            return view('datatables.showeq', compact('roomtasks','cartasks','users','cameratasks'));
        }

        return view('datatables.index', compact('roomtasks','cartasks','users','cameratasks'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {

        $roomtasks = RoomTask::with('user.roles','user.subroles','roomlist','roles');

        if(Auth::check() && Auth::user()->role == 7)//พนักงานขับรถ 7
        {
            return Datatables::of($roomtasks)
                ->addColumn('action', function ($roomtasks) {
                    return '
                 <a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#myModal' . $roomtasks->id . '">
                 <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดเพิ่มเติม </a> 
                           ';

                })
                ->make(true);

        }

        else if(Auth::check() && Auth::user()->role == 8)//เจ้าหน้าที่โสต 8
        {
            return Datatables::of($roomtasks)
                ->addColumn('action', function ($roomtasks) {
                    return '
                 <a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#myModal' . $roomtasks->id . '">
                 <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดเพิ่มเติม </a> 
                           ';

                })
                ->make(true);

        }

            return Datatables::of($roomtasks)
                ->addColumn('action', function ($roomtasks) {
                    return '<a href="/datatables/togglestatus/' . $roomtasks->id . '" class="btn btn-xs btn-warning">
                <i class="glyphicon glyphicon-refresh"></i> เปลี่ยนสถาณะ</a>

                 <a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#myModal' . $roomtasks->id . '">
                 <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดเพิ่มเติม </a> 
                 
                 <a href="/roomtasks/destroy/' . $roomtasks->id . '" class="btn btn-xs btn-danger" >
                 <i class="glyphicon glyphicon-exclamation-sign"></i> ลบ </a>\'';

                })
                ->make(true);


    }

    public function ToggleStatus($id)
    {
        $roomtasks = RoomTask::findOrFail($id);
        $roomtasks->status = !$roomtasks->status;
        $roomtasks->save();
        return redirect()->back();
    }



    public function getId()
    {
        $cartasks = CarTask::all();
        $roomtasks = RoomTask::with('user.roles','user.subroles','roomlist','roles');
        $roles = Role::all();
        $subroles = SubRole::all();
        $cameratasks = CameraTask::all();

        if (request()->ajax()) {

            return Datatables::of($roomtasks)->make(true);

        }
        else if(Auth::check() && Auth::user()->role==1) //admin
        {
            $roomtasks = $roomtasks->get();
            return view('datatables.show',compact('roomtasks','cartasks','roles','subroles','cameratasks'));
        }
        else if(Auth::check() && Auth::user()->role >1 && Auth::user()->role <=6) //กลุ่มภารกิจ 2-6
        {
            $roomtasks = $roomtasks->get();
            return view('datatables.show',compact('roomtasks','cartasks','roles','subroles','cameratasks'));
        }
        else if(Auth::check() && Auth::user()->role==7) //คนขับรถ 7
        {
//            $roomtasks = $roomtasks->get();
//            return view('datatables.showdriver',compact('roomtasks','cartasks','roles','subroles','cameratasks'));

            $roomtasks = $roomtasks->get();
            return view('datatables.showdriver',compact('roomtasks','cartasks','roles','subroles','cameratasks'));
        }

        else if(Auth::check() && Auth::user()->role==9) //แม่บ้าน 9
        {
            $roomtasks = $roomtasks->get();
            return view('datatables.showkeeper',compact('roomtasks','cartasks','roles','subroles','cameratasks'));
        }
        else if(Auth::check() && Auth::user()->role==10) //สหสาขาวิชา 10
        {
            $roomtasks = $roomtasks->get();
            return view('datatables.showsaha',compact('roomtasks','cartasks','roles','subroles','cameratasks'));
        }
    }



    public function getbyId()
    {

        $roomtasks = RoomTask::with('user','user.roles','user.subroles','roomlist','roles','subroles')->where('user_id', Auth::user()->id);

        return Datatables::of($roomtasks)
            ->addColumn('action', function ($roomtasks) {

                return '<a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#myModal' . $roomtasks->id . '"> 
                   <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดการจอง </a>
                   
                    <a href="/roomtasks/destroy/' . $roomtasks->id . '  " class="btn btn-xs btn-danger" >
                 <i class="glyphicon glyphicon-exclamation-sign"></i> ลบ </a>';


            })
            ->make(true);
    }



}
