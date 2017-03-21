
@foreach ($roomtasks as $roomtask )

    <div class="modal fade" id="myModal{{$roomtask->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{$roomtask->roomlist->roomname}}</h4>
                </div>
                <div class="modal-body">

                    <img src="/images/{{$roomtask->roomlist->image}}" class="img-rounded" width="350" height="236">
                    <p><strong>เริ่มประชุม:</strong>   {{$roomtask->start_at}}</p>
                    <p><strong>สิ้นสุด:</strong> {{$roomtask->finish_at}}</p>

                    <p><strong>จองโดย: </strong>{{$roomtask->user->name}} </p>
                    <p><strong>หน่วยงาน: </strong>{{$roomtask->user->roles->name}}</p>
                    <p><strong>สหสาขาวิชา: </strong>{{$roomtask->user->subroles->name}}</p>

                    <p><strong>จำนวนผู้เข้าประชุม: </strong>{{$roomtask->capacity}} คน </p>

                    <p><strong>รายละเอียดการประชุม:</strong></p>
                    <p>{{$roomtask->description}}</p>
                    {{--Show devices of spicific room--}}
                    @if(count($roomtask->devices))
                        <p><strong>อุปกรณโสตฯ :</strong></p>
                        <ul>
                            @foreach($roomtask->devices as $device)
                                <li>{{$device->name}}</li>

                            @endforeach
                        </ul>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

@endforeach