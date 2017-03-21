<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">



    {{--Kanit Font--}}
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <!-- Styles -->
    <style>
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/kanit.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->

</head>


<body>
<div class="se-pre-con"></div>
@include('layouts.nav')
<div class="container">

    @include('layouts.flash')

    @yield('content')



    @include('layouts.footer')
</div>



<!-- jQuery -->
<script  src="/js/jquery-2.1.3.min.js"></script>

<!-- DataTables -->
<script src="/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="/js/bootstrap.min.js"></script>
<!-- DataButton -->
<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<!-- Datatable Print Button -->
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<!-- Datatable JS Button -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>

<!-- Datatable PDF Button -->
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js"></script>
<!-- Datatable VFS font Button -->
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>

<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>



{{--Show GIF while load--}}
<script type="text/javascript">
    $(document).ready(function() {
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
        });
    });
</script>
<!-- App scripts -->
@stack('scripts')
</body>
</html>