{{--CarTask--}}
@foreach ($cartasks as $cartask )

    <div class="modal fade" id="carModal{{$cartask->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="carTaskModalLabel">
                        {{$cartask->carlist->brand}} {{$cartask->carlist->model}} {{$cartask->carlist->type}}

                    </h4>
                </div>

                <div class="modal-body">

                    <img src="/images/{{$cartask->carlist->image}}" class="img-rounded" width="350" height="236">

                    <p><strong>วัน/เวลา เดินทางไป:</strong>   {{$cartask->start_at}}</p>
                    <p><strong>วัน/เวลา เดินทางกลับ:</strong> {{$cartask->finish_at}}</p>
                    <p><strong>จำนวนผู้เข้าโดยสาร: </strong>{{$cartask->passenger}} คน </p>
                    <p><strong>จองโดย: </strong>{{$cartask->user->name}} </p>
                    <p><strong>กลุ่มภารกิจ: </strong>{{$cartask->user->roles->name}} </p>
                    <p><strong>สหสาขาวิชา: </strong>{{$cartask->user->subroles->name}}</p>

                    <p><strong>ทะเบียนรถ:</strong>  {{$cartask->carlist->license}}</p>
                    <p><strong>พนักงานขับรถ:</strong> {{$cartask->driver}}
                    <p><strong>เพื่อ:</strong> {{$cartask->purpose}}</p>
                    <p><strong>รายละเอียด:</strong></p>
                    <p>{{$cartask->description}}</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

@endforeach