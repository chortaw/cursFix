
@foreach ($roomlists as $roomlist )

    <div class="modal fade" id="ViewRoomModal{{$roomlist->id}}" tabindex="-1" role="dialog" aria-labelledby="ViewRoomModalLabel" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="ViewRoomModalLabel">{{$roomlist->roomname}}</h4>
                </div>
                <div class="modal-body">

                    <img src="/images/{{$roomlist->image}}" class="img-rounded" width="350" height="236">
                    <p><strong>ความจุห้องประชุม:  </strong>{{$roomlist->capacity}} คน </p>
                    <p><strong>รายละเอียดห้องประชุม:</strong></p>
                    <p>{{$roomlist->description}}</p>
                    {{--Show devices of spicific room--}}
                    @if(count($roomlist->devices))
                        <p><strong>อุปกรณโสตฯ :</strong></p>
                        <ul>
                            @foreach($roomlist->devices as $device)
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