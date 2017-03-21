
@foreach ($carlists as $carlist )

    <div class="modal fade" id="ViewCarModal{{$carlist->id}}" tabindex="-1" role="dialog" aria-labelledby="ViewCarModalLabel" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="ViewCarModalLabel">{{$carlist->brand}} {{$carlist->model}} : {{$carlist->type}} </h4>
                </div>
                <div class="modal-body">

                    <img src="/images/{{$carlist->image}}" class="img-rounded" width="350" height="236">
                    <p><strong>ความจุ : </strong>{{$carlist->capacity}} คน </p>
                    <p><strong>ทะเบียน :  </strong>{{$carlist->license}} </p>
                    <p><strong>รายละเอียดยานพาหนะ:</strong></p>
                    <p>{{$carlist->description}}</p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

@endforeach