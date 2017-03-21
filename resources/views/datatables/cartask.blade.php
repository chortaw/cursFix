@extends('layouts.master')

@section('content')
    <table class="table table-bordered" id="roomtask-table">
        <thead>
        <tr>
            <th>ลำดับที่</th>
            <th>จองโดย</th>
            <th>ไปปฎิบัติงานที่</th>
            <th>เพื่อ</th>
            <th>สถานที่</th>
            <th>จำนวนผู้โดยสาร</th>
            <th>โทรศัพท์ที่ติดต่อได้</th>
            <th>เวลาเดินทางไป</th>
            <th>เวลาเดินทางกลับ</th>
            <th>ทะเบียนรถ</th>
            <th>พนักงานขับรถ</th>
            <th style="width: 7%">สถานะ</th>
            <th>จัดการ</th>
        </tr>
        </thead>
    </table>


    @foreach ($cartasks as $cartask)
        <div class="modal fade" id="carTaskModal{{$cartask->id}}" tabindex="-1" role="dialog" aria-labelledby="carTaskModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="carTaskModalLabel">{{$cartask->vehicle}}</h4>
                    </div>
                    <div class="modal-body">
                        <p><strong>วัน/เวลา เดินทางไป:</strong>   {{$cartask->start_at}}</p>
                        <p><strong>ัน/เวลา เดินทางกลับ:</strong> {{$cartask->finish_at}}</p>
                        <p><strong>จำนวนผู้เข้าโดยสาร: </strong>{{$cartask->passenger}} คน </p>


                        <p><strong>ทะเบียนรถ:</strong></p>
                        <p><strong>พนักงานขับรถ:</strong></p>
                        <p>{{$cartask->description}}</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@stop



@push('scripts')
<script>
    $(function() {
        $('#roomtask-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.cardata') !!}',
            oLanguage: {
                "sLengthMenu": "แสดงผลทีละ _MENU_ รายการ",
                "sSearch": "ค้นหา:",
                "sInfo": "จากจำนวนทั้งหมด _TOTAL_ รายการ แสดงผลรายการที่ (_START_ ถึง _END_)",
                "sInfoEmpty": "ไม่มีข้อมูลให้แสดงผล",
                "sEmptyTable": "ไม่มีข้อมูลในระบบ",
                "sZeroRecords": "ไม่มีข้อมูลในระบบ",
                oPaginate: {
                    "sNext": "หน้าต่อไป",
                    "sPrevious": "หน้าก่อนหน้า"
                }
            },
            columns: [

                { data: 'id', name: 'id' },
                { data: 'user.name', name: 'user.name' },
                { data: 'description', name: 'description' },
                { data: 'purpose', name: 'purpose' },
                { data: 'place', name: 'place' },
                { data: 'contactNumber', name: 'contactNumber' },
                { data: 'passenger', name: 'passenger' },
                { data: 'start_at', name: 'start_at' },
                { data: 'finish_at', name: 'finish_at' },
                { data: 'vehicle', name: 'vehicle' },
                { data: 'driver', name: 'driver' },
                { data: 'status', name: 'status' ,render: function ( data, type, full, meta )
                {return data==0 ? '<span style="color: red">รออนุมัติ</span>' : '<span style="color: green">อนุมัติ</span>' ;} },
                {data: 'action', name: 'action', orderable: false, searchable: false},


            ]
        });
    });

</script>
{{--Slide up the flash--}}
<script>
    $('div.alert').not('.alert.important').delay(2000).slideUp(300);
</script>
@endpush