@extends('layouts.master')

@section('content')

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#roomtask">ห้องประชุม</a></li>
        <li><a data-toggle="tab" href="#vehicle">ยานพาหนะ</a></li>
        <li><a data-toggle="tab" href="#camera">พนักงานถ่ายรูป</a></li>
        <li><a data-toggle="tab" href="#user">จัดการผู้ใช้งานในระบบ</a></li>
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
                    <th>จำนวนชั่วโมง</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
            </table>

            @include('layouts.getroomtask')

        </div>
        <div id="vehicle" class="tab-pane fade">
            <h3>ประวัติการจองยานพาหนะ</h3>
            <table class="table table-bordered" id="cartask-table">
                <thead>
                <tr>
                    <th>ลำดับที่</th>
                    <th>จองโดย</th>
                    <th>กลุ่มภารกิจ</th>
                    <th>สหสาขาวิชา</th>
                    <th>ไปปฎิบัติงานที่</th>
                    <th>เพื่อ</th>
                    <th>สถานที่</th>
                    <th>เวลาเดินทางไป</th>
                    <th>เวลาเดินทางกลับ</th>
                    <th>ทะเบียนรถ</th>
                    <th >สถานะ</th>
                    <th>จำนวนชั่วโมง</th>
                    <th style="width: 7%">จัดการ</th>
                </tr>
                </thead>
            </table>
            @include('layouts.getcartask')
        </div>

        <div id="camera" class="tab-pane fade">
                <h3>ประวัติการจองพนักงานถ่ายถาพ</h3>

                <table class="table table-bordered" id="camera-table">
                    <thead>
                    <tr>
                        <th>ลำดับที่</th>
                        <th>จองโดย</th>
                        <th>กลุ่มภารกิจ</th>
                        <th>เพื่อ</th>
                        <th>สถานที่</th>
                        <th>จำนวนชั่วโมง</th>
                        <th >สถานะ</th>
                        <th style="width: 7%">จัดการ</th>
                    </tr>
                    </thead>
                </table>
             @include('layouts.getcamerataskmodal')
        </div>

        <div id="user" class="tab-pane fade">

            <h3>ข้อมูลผู้ใช้งานในระบบ</h3>

            <table class="table table-bordered" id="user-table">
                <thead>
                <tr>
                    <th>ลำดับที่</th>
                    <th>ชื่อ</th>
                    <th>อีเมล์</th>
                    <th>กลุ่มภารกิจ</th>
                    <th>สหสาขาวิชา</th>
                    <th style="width: 7%">จัดการ</th>
                </tr>
                </thead>
            </table>

 @include('layouts.viewusermodal')
        </div>

    </div>
@stop



@push('scripts')

<script>
    $(function() {
        $('#roomtask-table').DataTable({
            processing: true,
            serverSide: true,

            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text:'รายงานผลรูปแบบ EXCEL',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text:'รายงานผลรูปแบบ PDF',
                    exportOptions: {
                        columns: [ 0, 1, 2, 5 ]
                    }
                },
               { extend:'colvis',text:'เลือกคอลัมน์'}

            ],
            ajax: '{!! route('datatables.data') !!}',
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
                { data: 'hours', name: 'hours' },
                {data: 'action', name: 'action', orderable: false, searchable: false},

            ]



        });

    });

</script>

{{--Cartask script--}}
<script>
    $(function() {
        $('#cartask-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.cardata') !!}',
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
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text:'รายงานผลรูปแบบ EXCEL',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text:'รายงานผลรูปแบบ PDF',
                    exportOptions: {
                        columns: [ 0, 1, 2, 5 ]
                    }
                },
                { extend:'colvis',text:'เลือกคอลัมน์'}

            ],
            columns: [

                { data: 'id', name: 'id' },
                { data: 'user.name', name: 'user.name' },
                {data: 'user.roles.name', name: 'user.roles.name' },
                {data: 'user.subroles.name', name: 'user.subroles.name' },
                { data: 'description', name: 'description' },
                { data: 'purpose', name: 'purpose' },
                { data: 'place', name: 'place' },
                { data: 'start_at', name: 'start_at' },
                { data: 'finish_at', name: 'finish_at' },
                { data: 'alllists.license', name: 'alllists.license' },
                { data: 'hours', name: 'hours' },
                { data: 'status', name: 'status' ,render: function ( data, type, full, meta )
                {return data==0 ? '<span style="color: red">รออนุมัติ</span>' : '<span style="color: green">อนุมัติ</span>' ;} },
                {data: 'action', name: 'action', orderable: false, searchable: false},


            ]

        });

    });

</script>

{{--User Script--}}
<script>
    $(function() {
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.userdata') !!}',
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
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text:'รายงานผลรูปแบบ EXCEL',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text:'รายงานผลรูปแบบ PDF',
                    exportOptions: {
                        columns: [ 0, 1, 2, 5 ]
                    }
                },
                { extend:'colvis',text:'เลือกคอลัมน์'}

            ],
            columns: [

                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'roles.name', name: 'roles.name' },
                 {data: 'subroles.name', name: 'subroles.name' },
                {data: 'action', name: 'action', orderable: false, searchable: false},


            ]

        });

    });

</script>

{{--Camera Script--}}
<script>
    $(function() {
        $('#camera-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.cameradata') !!}',
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
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text:'รายงานผลรูปแบบ EXCEL',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text:'รายงานผลรูปแบบ PDF',
                    exportOptions: {
                        columns: [ 0, 1, 2, 5 ]
                    }
                },
                { extend:'colvis',text:'เลือกคอลัมน์'}

            ],
            columns: [

                { data: 'id', name: 'id' },
                { data: 'user.name', name: 'user.name' },
                { data: 'user.roles.name', name: 'user.roles.name' },
                { data: 'description', name: 'description' },
                { data: 'place', name: 'place' },
                { data: 'hours', name: 'hours' },
                { data: 'status', name: 'status' ,render: function ( data, type, full, meta )
                {return data==0 ? '<span style="color: red">รออณุมัติ</span>' : '<span style="color: green">อนุมัติ</span>' ;} },
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