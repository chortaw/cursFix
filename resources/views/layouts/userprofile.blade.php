@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">แก้ไขข้อมูลผู้ใช้</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/users/{{$users->id}}/edit">

                        {{ method_field('PUT') }}
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">ชื่อ</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" value="{{$users->name}}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">อีเมล์</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$users->email}}" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">กลุ่มภารกิจ</label>
                            <div class="col-md-6">
                                <input id="role" type="text" disabled="disabled" class="form-control" value="{{$users->roles->name}}" required autofocus>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="sub_role" class="col-md-4 control-label">สหสาขาวิชา</label>
                            <div class="col-md-6">
                                <input id="sub_role" type="text" disabled="disabled" class="form-control" value="{{$users->subroles->name}}" required autofocus>

                            </div>
                        </div>






                        <div class="form-group">
                           <div class="col-md-6 col-md-offset-4">
                             <button type="submit" class="btn btn-primary">แก้ไข</button>
                             <button href="{{ URL::previous() }}" class="btn btn-primary pull-right" >กลับ</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
            @include('layouts.errors')
@endsection




