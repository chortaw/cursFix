@extends('layouts.master')

@section('content')

            <h3>ประวัติการจองยานพาหนะ</h3>
            <table class="table table-bordered" id="cartask-table">
                <thead>
                <tr>
                    <th>ลำดับที่</th>
                    <th>จองโดย</th>
                    <th>กลุ่มภารกิจ</th>
                    <th>สหสาขาวิชา</th>
                    <th>ไปปฎิบัติงานที่</th>
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
          @include('layouts.drivercartaskmodal')
@stop



@push('scripts')

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




{{--Slide up the flash--}}
<script>
    $('div.alert').not('.alert.important').delay(2000).slideUp(300);
</script>


@endpush