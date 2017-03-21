<?php

namespace App\Http\Controllers;

use App\CarTask;
use App\Room;
use App\RoomTask;
use Illuminate\Http\Request;
use App\Car;

class CarListController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['only' => [
            'store'
        ]]);
    }


    public function index(){
        $roomlists = Room::all();
        $carlists = Car::orderBy('created_at', 'dsc')->get();
        return view('alllists.index', compact('carlists','roomlists'));

    }

    public function index2(){
        $roomlists = Room::all();
        $carlists = Car::orderBy('created_at', 'dsc')->get();
        return view('welcome', compact('carlists','roomlists'));

    }



    public function store (){

        $carlists = Car::all();
        $roomtasks = RoomTask::all();
        $cartasks = CarTask::all();


        Car::create([

            'description'=>request('description'),
            'capacity'=>request('capacity'),
            'type'=>request('type'),
            'license'=>request('license'),
            'model'=>request('model'),
            'brand'=>request('brand'),
            'image'=>request('image')

        ]);
        session()->flash('message','เพิ่มรถยนต์ใหม่ในระบบสำเร็จ'); //FLASH
        return view('datatables.show',compact('carlists','roomtasks','cartasks'));    }

}
