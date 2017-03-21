@extends('layouts.app')


        <!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title></title>
</head>
<body>

@section('content')

    <div class="container">
        <h1>แก้ไขข้อมูลห้อง</h1>
        <hr>

        <form method="post" action="/roomlist/{{$roomlist->id}}/edit">

            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="form-group">
                <label for="image" class="control-label"> รูปห้อง:</label> <img src="/images/{{$roomlist->image}}">
                <input id="input-1" type="file" class="file" name="image" >



            </div>

            <div class="form-group">
                <label for="roomname">ชื่อห้อง:</label>
                <textarea class="form-control" name="roomname" rows="1" >{{$roomlist->roomname}}</textarea>
            </div>

            <div class="form-group">
                <label for="capacity">ความจุ:</label>
                <textarea class="form-control" name="capacity" rows="1" >{{$roomlist->capacity}}</textarea>
            </div>

            <div class="form-group">
                <label for="description">รายละเอียด:</label>
                <textarea class="form-control" name="description" rows="2" >{{$roomlist->description}}</textarea>
            </div>

            <div class="form-group">
                {!! Form::label('devices','อุปกรณ์โสตฯ:') !!}
                {!! Form::select('devices[]',$devices,$roomlist->devicesList(),['id'=>'good_List','clsss'=>'form-control','multiple']) !!}
            </div>



            <div class="form-group">
                <button type="submit" class="btn btn-primary">เพิ่ม</button>
                <button href="{{ URL::previous() }}" class="btn btn-primary pull-right" >กลับ</button>
            </div>

            @include('layouts.errors')

        </form>

    </div>
@endsection
</body>


</html>
