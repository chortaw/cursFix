
@foreach ($cameratasks as $cameratask)

    <div class="modal fade" id="CameraTaskModal{{$cameratask->id}}" tabindex="-1" role="dialog" aria-labelledby="CameraTaskModalLabel" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="CameraTaskModalLabel">รายละเอียดการจอง</h4>
                </div>
                <div class="modal-body">

                    <p><strong>เริ่มจอง:</strong>   {{$cameratask->start_at}}</p>
                    <p><strong>สิ้นสุด:</strong> {{$cameratask->finish_at}}</p>

                    <p><strong>จองโดย: </strong>{{$cameratask->user->name}}   <strong>หน่วยงาน: </strong>{{$cameratask->user->roles->name}} </p>

                    <p><strong>สหสาขาวิชา: </strong>{{$cameratask->user->subroles->name}}</p>
                    <p><strong>พนักงานถ่ายภาพ: </strong>{{$cameratask->cameraMan}}</p>

                    <p><strong>รายละเอียดการจอง:</strong></p>
                    <p>{{$cameratask->description}}</p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

@endforeach