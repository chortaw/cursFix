@extends('layouts.master')

@section('content')

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#roomtask">ห้องประชุม</a></li>
        <li><a data-toggle="tab" href="#cartask">ยานพาหนะ</a></li>
        <li><a data-toggle="tab" href="#camera">พนักงานถ่ายรูป</a></li>
    </ul>

    <div class="tab-content">
        <div id="roomtask" class="tab-pane fade in active">

            <h3>ประวัติการจองห้องประชุม</h3>
            <table class="table table-bordered" id="roomtask-table">
                <thead>
                <tr>
                    <th>ลำดับที่</th>
                    <th>จองโดย</th>
                    <th>กลุ่มภารกิจ</th>
                    <th>สหสาขาวิชา</th>
                    <th>ห้องประชุม</th>
                    <th>จองเมื่อ</th>
                    <th>จองถึง</th>
                    <th>เรื่องการประชุม</th>
                    <th>จำนวนผู้เข้าประชุม</th>
                    <th style="width: 7%">สถานะ</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
            </table>

            @include('layouts.getroomtask')

        </div>

        <div id="cartask" class="tab-pane fade">
            <h3>ประวัติการจองยานพาหนะ</h3>
            <table class="table table-bordered" cellspacing="0" width="100%" id="cartask-table">
                <thead>
                <tr>
                    <th>ลำดับที่</th>
                    <th>จองโดย</th>
                    <th>กลุ่มภารกิจ</th>
                    <th>ติดต่อ</th>
                    <th>ไปปฎิบัติงานที่</th>
                    <th>เพื่อ</th>
                    <th>สถานที่</th>
                    <th>เวลาเดินทางไป</th>
                    <th>เวลาเดินทางกลับ</th>
                    {{--<th>ทะเบียนรถ</th>--}}
                    {{--<th>พนักงานขับรถ</th>--}}
                    <th style="width: 7%">สถานะ</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
            </table>

            @include('layouts.getcartask')

        </div>

        <div id="camera" class="tab-pane fade">
            <h3>Avialable Soon</h3>

        </div>
    </div>

@stop



@push('scripts')
<script>
    $(function() {
        $('#roomtask-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.byid') !!}',
            oLanguage: {
                "sLengthMenu": "แสดงผลทีละ _MENU_ รายการ",
                "sSearch": "ค้นหา:",
                "sInfoFiltered": " - กรองจากผลลัพท์ทั้งหมด _MAX_ ผลลัพท์",
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
                {data: 'user.roles.name', name: 'user.roles.name' },
                {data: 'user.subroles.name', name: 'user.subroles.name' },
                { data: 'roomlist.roomname', name: 'roomlist.roomname' },
                { data: 'start_at', name: 'start_at' },
                { data: 'finish_at', name: 'finish_at' },
                { data: 'topic', name: 'topic' },
                { data: 'capacity', name: 'capacity' },
                { data: 'status', name: 'status' ,render: function ( data, type, full, meta )
                {return data==0 ? '<span style="color: red">รออนุมัติ</span>' : '<span style="color: green">อนุมัติ</span>' ;} },
                {data: 'action', name: 'action', orderable: false, searchable: false},


            ]

        });
    });

</script>

{{--CarTask script--}}
<script>
    $(function() {
        $('#cartask-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.carIddata') !!}',
            oLanguage: {
                "sLengthMenu": "แสดงผลทีละ _MENU_ รายการ",
                "sInfoFiltered": " - กรองจากผลลัพท์ทั้งหมด _MAX_ ผลลัพท์",
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
                {data: 'user.roles.name', name: 'user.roles.name' },
                { data: 'contactNumber' , name: 'contactNumber'},
                { data: 'description', name: 'description' },
                { data: 'purpose', name: 'purpose' },
                { data: 'place', name: 'place' },
                { data: 'start_at', name: 'start_at' },
                { data: 'finish_at', name: 'finish_at' },
//                { data: 'alllists.license', name: 'alllists.license   ' },
//                { data: 'driver', name: 'driver' },
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