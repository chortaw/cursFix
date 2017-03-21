@extends('layouts.app')

        <!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>

@section('content')

    <h1>แก้ไขรายละเอียดการจองห้อง: {{ $roomtasks->roomname }}</h1>
    <hr>


    {{--<h1>Edit Room Details</h1>--}}
    {{--'url'=>'roomtasks/'. $roomtasks->id--}}

    {{--{!! Form::model($roomtasks, ['method'=>'PATCH','action' =>'RoomTaskController@update',$roomtasks->id]) !!}--}}
    {{--@include('roomtasks.form',['submitButtonText'=>'Update Room'])--}}
     {{--{!! Form::close() !!}--}}



    <form method="POST" action="/roomtasks/{{$roomtasks->id}}/edit" >

        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group">

            <div class="form-group">
                <label>ตั้งแต่วัน/เวลา:</label>
                <div class='input-group date' id='start_at' >
                        <input name="start_at" type='text' class="form-control" placeholder="{{ $roomtasks->start_at }}"/>
                         <span class="input-group-addon">
                             <span class="glyphicon glyphicon-calendar"></span>
                         </span>
                </div>
            </div>


            <div class="form-group">
                <label>จนถึงวัน/เวลา:</label>
                <div class='input-group date' id='finish_at' >
                    <input name="finish_at" type='text' class="form-control" placeholder="{{ $roomtasks->finish_at }}" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>


            <label for="room_id">ห้องเรียน/ห้องประชุม:</label>
            <select class="form-control" name="room_id">

                <option {{ $roomtasks->room_id == 'ห้องประชุม 1101 บัณฑิตวิทยาลัยชั้น 11' ? "selected":""}}>ห้องประชุม 1101 บัณฑิตวิทยาลัยชั้น 11</option>
                <option {{ $roomtasks->room_id == 'ห้องประชุม1201 บัณฑิตวิทยาลัยชั้น 12' ? "selected":""}}>ห้องประชุม1201 บัณฑิตวิทยาลัยชั้น 12	</option>
                <option {{ $roomtasks->room_id == 'ห้องประชุม 1301 บัณฑิตวิทยาลัย ชั้น 13' ? "selected":""}}>ห้องประชุม 1301 บัณฑิตวิทยาลัย ชั้น 13</option>
                <option {{ $roomtasks->room_id == 'ห้องประชุม 1302 ห้องประชุมภายในผู้บริหารบัณฑิตวิทยาลัยชั้น 13' ? "selected":""}}>ห้องประชุม 1302 ห้องประชุมภายในผู้บริหารบัณฑิตวิทยาลัยชั้น 13</option>
                <option {{ $roomtasks->room_id == 'ห้องประชุมชั้น 1401 บัณฑิตวิทยาลัยชั้น 14' ? "selected":""}}>ห้องประชุมชั้น 1401 บัณฑิตวิทยาลัยชั้น 14</option>
                <option {{ $roomtasks->room_id == 'ห้องประชุมชั้น 1402 บัณฑิตวิทยาลัยชั้น 14' ? "selected":""}}>ห้องประชุมชั้น 1402 บัณฑิตวิทยาลัยชั้น 14</option>
                <option {{ $roomtasks->room_id == 'ห้องประชุมชั้น 1501 บัณฑิตวิทยาลัยชั้น 15' ? "selected":""}}>ห้องประชุมชั้น 1501 บัณฑิตวิทยาลัยชั้น 15</option>
                <option {{ $roomtasks->room_id == 'ห้องประชุมชั้น 1502 บัณฑิตวิทยาลัยชั้น 15' ? "selected":""}}>ห้องประชุมชั้น 1502 บัณฑิตวิทยาลัยชั้น 15</option>

            </select>
        </div>

        <div class="form-group">
            <label for="topic">เรื่องของการเรียน/การประชุม :</label>
            <textarea class="form-control" name="topic" rows="1" >{{ $roomtasks->topic }}</textarea>
        </div>

        <div class="form-group">
            <label for="description">คำบรรยายพอสังเขป :</label>
            <textarea class="form-control" name="description" rows="2" > {{ $roomtasks->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="capacity">จำนวนผู้เข้าเรียน/เข้าประชุม :</label>
            <textarea class="form-control" name="capacity" rows="1" >{{ $roomtasks->capacity }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">แก้ไข</button>
        </div>

        @include('layouts.errors');

    </form>



@endsection
</body>

</html>
