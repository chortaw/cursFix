@extends('layouts.app')


@section('content')

    <div class="container">



        <div class="panel panel-default">
               <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#roomtask">รายละเอียดห้องประชุมในระบบ</a></li>
                    <li><a data-toggle="tab" href="#vehicle">รายละเอียดยานพาหนะในระบบ</a></li>
                    <li><a data-toggle="tab" href="#camera">พนักงานถ่ายรูป</a></li>
                </ul>

               <div class="panel-body">

                   <div class="tab-content">

                      <div id="roomtask" class="tab-pane fade in active">

                        @foreach($roomlists as $roomlist)
                          <div class="col-md-4">
                             <a href="#" data-toggle="modal" data-target="#ViewRoomModal{{$roomlist->id}}" >

                               @include('layouts.viewroommodal')

                                <div class="blog-post" >
                                  <h2 class="blog-post-title" > {{$roomlist->roonname}}  </h2>
                                  <img src="/images/{{$roomlist->image}}" class="img-rounded" width="304" height="236">
                                   <p class="blog-post-meta">อัพเดทล่าสุด: {{$roomlist->updated_at->toFormattedDateString()}} </p>
                                   <p>รายละเอียด: {{$roomlist->description}}</p>
                                </div>
                             </a>
                          </div>
                        @endforeach
                     </div>

                           <div id="vehicle" class="tab-pane fade">

                            @foreach($carlists as $carlist)


                                <div class="col-md-4">
                                     @include('layouts.viewcarmodal')
                                     <a href="#" data-toggle="modal" data-target="#ViewCarModal{{$carlist->id}}" >

                                        <div class="blog-post" >
                                          <h2 class="blog-post-title" > {{$carlist->type}}   </h2>
                                           <img src="/images/{{$carlist->image}}" class="img-rounded" width="304" height="236">
                                            <p class="blog-post-meta">อัพเดทล่าสุด: {{$carlist->updated_at->toFormattedDateString()}} </p>
                                        </div>
                                     </a>
                                </div>
                               @endforeach
                           </div>

                       <div id="camera" class="tab-pane fade">

                       <h3>Avialable Soon</h3>

                       </div>

                   </div>
               </div>
        </div>
    </div>
@stop

