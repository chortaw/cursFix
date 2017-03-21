@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">เลือกทำรายการ</div>

            <div class="panel-body">



                    <div class="col-md-4">
                        <a href="#" data-toggle="modal" data-target="#carTaskModal">
                            <div  class="panel panel-primary">
                                <div class="panel-heading" align="center">
                                    <span class="glyphicon glyphicon-road" style="font-size: 120px;" ></span>
                                </div>
                                <div class="panel-body" align="center">
                                    จองยานพาหนะ
                                </div>
                            </div>
                        </a>
                    </div>



                @include('layouts.cartaskmodal')
            </div>

        </div>
    </div>
@endsection




