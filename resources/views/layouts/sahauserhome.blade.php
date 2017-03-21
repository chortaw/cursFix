@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">เลือกทำรายการ</div>

            <div class="panel-body">

                <div class="row">
                    <div align="center">
                        <a href="#" data-toggle="modal" data-target="#myModal">
                            <div  class="panel panel-danger">
                                <div class="panel-heading" align="center">
                                    <span class="glyphicon glyphicon-blackboard"style="font-size: 120px;" ></span>
                                </div>
                                <div class="panel-body" align="center">
                                    จองห้องประชุม
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            @include('layouts.roomtaskmodal')
        </div>
    </div>
@endsection




