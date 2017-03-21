<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;
use App\Room;
use App;
use App\Devices;
use Illuminate\Support\Facades\Auth;

class RoomListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);

        $this->middleware('admin', ['only' => [
            'create'
        ]]);
    }

    public function index(){

        $roomlist = Room::orderBy('created_at', 'dsc')->get();
        return view('roomlist.index', compact('roomlist'));
    }

    public function create(){
        $devices = Devices::pluck('name','id');
        return view('roomlist.create', compact('devices'));
    }
    public function store(RoomRequest $request)
    {
        session()->flash('message','เพิ่มห้องสำเร็จ'); // FLASH

        $roomlist = Room::create($request->all());
        $deviceIds = $request->input('devices');
        $roomlist->devices()->attach($deviceIds);
        return redirect('/alllists');

    }

    public function show(Room $roomlist){

        return view('roomlist.show',compact('roomlist'));

    }

    public function edit($id){


        $roomlist = Room::findorfail($id);
        $devices = Devices::pluck('name','id');
        return view('roomlist.edit',compact('roomlist','devices'));

    }

    public function update(RoomRequest $request,$id){

        $roomlist = Room::findOrFail($id);
        $roomlist->update($request->all());
        $deviceIds = $request->input('devices');
        $roomlist->devices()->sync($deviceIds);
        return redirect('roomlist');
        }



}
