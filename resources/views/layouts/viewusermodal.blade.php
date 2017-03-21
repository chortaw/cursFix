
@foreach ($users as $user)

    <div class="modal fade" id="ViewUserModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="ViewUserModalLabel" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="ViewUserModalLabel">{{$user->name}}</h4>
                </div>
                <div class="modal-body">

                    {{--<img src="/images/{{$user->image}}" class="img-rounded" width="350" height="236">--}}
                    <p><strong>ชื่อ:</strong> {{$user->name}}</p>
                    <p><strong>Email:</strong> {{$user->email}}</p>
                    <p><strong>กลุ่มภารกิจ:</strong> {{$user->roles->name}}</p>
                    {{--<p><strong>สหสาขาวิชา:</strong> {{$user->subroles->name}}</p>--}}


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

@endforeach