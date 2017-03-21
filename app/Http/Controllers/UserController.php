<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
class UserController extends Controller
{
    public function getAll(){

        $users = User::with('user.roles','user.subroles','roles','subroles');

        return Datatables::of($users)

            ->addColumn('action', function ($users) {
                return '
                
                 <a href="#" class="btn btn-xs btn-success"  data-toggle="modal" data-target="#ViewUserModal' . $users->id . '">
                 <i class="glyphicon glyphicon-exclamation-sign"></i> รายละเอียดเพิ่มเติม</a>
                 
                  <a href="/users/destroy/' . $users->id . '  " class="btn btn-xs btn-danger" >
                 <i class="glyphicon glyphicon-exclamation-sign"></i> ลบ </a> ';
            })
            ->make(true);
    }

    public function edit($id){


        $users = User::with('user.roles','user.subroles','roles','subroles')->findorfail($id);


        if($users->id == Auth::user()->id  ) {

            return view('layouts.userprofile',compact('users'));
        }
        else
        {
            return redirect('home');
        }


    }

    public function destroy($id)
    {
        $users= User::findOrFail($id);
        $users->delete();

        return redirect()->back();
    }
}
