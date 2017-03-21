<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CameraTask;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;


class CameraTaskController extends Controller
{
    public function GetAllTask(){

        $cameratasks = CameraTask::with('user.roles','user.subroles','roles','subroles')->get();

        return Datatables::of($cameratasks)
            ->addColumn('action', function ($cameratasks) {

                return '<a href="/cameratask/togglestatus/' . $cameratasks->id . '" class="btn btn-xs btn-warning">
                <i class="glyphicon glyphicon-refresh"></i> เปลี่ยนสถาณะ</a>

                 <a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#CameraTaskModal' . $cameratasks->id . '">
                 <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดเพิ่มเติม</a>
                 
                  <a href="/cameratask/destroy/' . $cameratasks->id . '  " class="btn btn-xs btn-danger" >
                 <i class="glyphicon glyphicon-exclamation-sign"></i> ลบ </a> ';
            })
            ->make(true);
    }





    public function store(){

        $current = Carbon::parse(request('start_at'));
        $dt      = Carbon::parse(request('finish_at'));
        $hours = $current->diffInHours($dt);

          CameraTask::create([
              'user_id'=>auth()->id(),
              'contactNumber'=>request('contactNumber'),
              'description' =>request('description'),
              'cameraMan'=>request('cameraMan'),
              'place'=>request('place'),
              'start_at'=>request('start_at'),
              'finish_at'=>request('finish_at'),
              'hours'=> $hours,


        ]);

        session()->flash('message','จองพนักงานถ่านรูปสำเร็จ โปรดรอการอณุมัติ'); //FLASH

        return redirect('datatables/show');
    }

    public function destroy($id)
    {
        $cameratasks = CameraTask::findOrFail($id);
        $cameratasks->delete();

        return redirect()->back();
    }

    public function ToggleStatus($id)
    {
        $cameratasks = CameraTask::findOrFail($id);
        $cameratasks->status = !$cameratasks->status;
        $cameratasks->save();
        return redirect()->back();
    }
}
