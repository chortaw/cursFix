<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="{{ asset('favicon.png') }}" >

<head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{--Kanit Font--}}
    <link href="/css/kanit.css" rel="stylesheet">

    <!-- Styles -->



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/bootstrap-glyphicons.css" >
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.print.css">

    <link href="/css/app.css" rel="stylesheet">


    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <style>
        .blog-post {
            margin-bottom: 4rem;
        }
        .blog-post-title {
            margin-bottom: .25rem;
            font-size: 2.5rem;
        }
        .blog-post-meta {
            margin-bottom: 1.25rem;
            color: #999;
        }

         .se-pre-con {
             position: fixed;
             left: 0px;
             top: 0px;
             width: 100%;
             height: 100%;
             z-index: 9999;
             background: url(/images/Preloader_3.gif) center no-repeat #fff;
         }

    </style>


</head>

<body >
<div class="se-pre-con"></div>
@include('layouts.nav')

@include('layouts.flash')


@yield('content')






<!-- App scripts -->
<script  src="/js/jquery-2.1.3.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/moment-2.10.3.js"></script>
<script src="/js/bootstrap-datetimepicker.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>

<!-- DataTables -->
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/select2.min.js"></script>


         {{--FOR ROOMLIST DEVICES SELECT2 --}}
        <script type="text/javascript">
            $('#good_List').select2({
                width: '100%',
                placeholder:' เพิ่มอุปกรณโสตฯ',

            });
        </script>

         {{--FOR ROOMTASK DEVICES SELECT2 --}}
        <script type="text/javascript">
            $('#good_Lists').select2({
                width: '100%',
                placeholder:' เพิ่มอุปกรณโสตฯ',

              });
        </script>

    {{--Slide up the flash--}}
    <script>
    $('div.alert').not('.alert.important').delay(3000).slideUp(300);
    </script>

 {{--DATETIME PICKER--}}
<script type="text/javascript">
    $(function () {

        $('#start_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
        });
        $('#finish_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
        });
        $("#start_at").on("dp.change", function (e) {
            $('#finish_at').data("DateTimePicker").minDate(e.date);
        });
        $("#finish_at").on("dp.change", function (e) {
            $('#start_at').data("DateTimePicker").maxDate(e.date);
        });

                //For CarTask//

        $('#carstart_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
        });
        $('#carfinish_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
        });
        $("#start_att").on("dp.change", function (e) {
            $('#carfinish_at').data("DateTimePicker").minDate(e.date);
        });
        $("#finish_att").on("dp.change", function (e) {
            $('#carstart_at').data("DateTimePicker").maxDate(e.date);
        });

        //For CameraTask//

        $('#camstart_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
        });
        $('#camfinish_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
        });
        $("#camstart_at").on("dp.change", function (e) {
            $('#camfinish_at').data("DateTimePicker").minDate(e.date);
        });
        $("#camfinish_at").on("dp.change", function (e) {
            $('#camstart_at').data("DateTimePicker").maxDate(e.date);
        });
    });

</script>


 {{--Show GIF while load--}}
<script type="text/javascript">
    $(document).ready(function() {
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
        });
    });
</script>

</body>
@include('layouts.footer')

</html>
