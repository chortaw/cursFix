<!DOCTYPE html>
<html lang="en">

<head>
    <style>
       .portfolio-hover-content {
            position: absolute;
            width: 100%;
            height: 20px;
            font-size: 20px;
            text-align: center;
            top: 50%;
            margin-top: -12px;
            color: white;
        }

       .portfolio-caption {
           max-width: 400px;
           margin: 0 auto;
           background-color: white;
           text-align: center;
           padding: 25px;
       }

       #calendar {
            display: block;
            margin: auto;
            width: 60%;
            height: 100%;
        }


    </style>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>บัณฑิตวิทยาลัย จุฬาลงกรณ์มหาวิทยาลัย</title>

<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

<link href='/css/fullcalendar.min.css' rel='stylesheet' />
<link href='/css/jquery.qtip.min.css' rel='stylesheet' />
<link href='/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<!-- Theme CSS -->
<link href="css/agency.min.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
<![endif]-->

</head>

<body id="page-top" class="index">
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Graduate School, Chulalongkorn University</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Room lists</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#calendar">Calendar</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ url('/login') }}">Login</a>
                    </li>
                </ul>
            </div>
        <!-- /.navbar-collapse -->
        </div>
    <!-- /.container-fluid -->
    </nav>

<!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Chulalongkorn University</div>
                <div class="intro-heading">Graduate School</div>
                <a href="#services" class="page-scroll btn btn-xl">คลิกที่นี้เพื่อเริ่มต้น</a>
            </div>
        </div>
    </header>

<!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">บริการจองที่มีในระบบ</h2>
                    <h3 class="section-subheading text-muted">จองห้องประชุม จองยานพาหนะ และ จองเจ้าหน้าที่ถ่ายภาพ</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-comments fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">จองห้องประชุม</h4>
                    <p class="text-muted"> บุคลากรใน บัณฑิตวิทยาลัย จุฬาลงกรณ์มหาวิทยาลัยสามรถจองห้องประชุมในระบบได้   </p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">จองยานพาหนะ</h4>
                    <p class="text-muted"> กลุ่มภารกิจใน บัณฑิตวิทยาลัย จุฬาลงกรณ์มหาวิทยาลัยสามรถจองยานพาหนะในระบบได้  </p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-camera-retro  fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">จองเจ้าหน้าที่ถ่ายภาพ</h4>
                    <p class="text-muted">บุคลากรใน บัณฑิตวิทยาลัย จุฬาลงกรณ์มหาวิทยาลัยสามรถจอเจ้าหน้าที่ถ่านภาพ</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">ห้องประชุม</h2>
                    <h3 class="section-subheading text-muted">ห้องประชุมที่มีในระบบ</h3>
                </div>
            </div>

            @foreach($roomlists as $roomlist)
            <div class="portfolio-item col-lg-4" >
                <a href="#" data-toggle="modal"   class="portfolio-link"  data-target="#roomModal{{$roomlist->id}} " >
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="/images/{{$roomlist->image}}" class="img-responsive" style="width: 100%; height: 280px;" >
                </a>
                <div class="portfolio-caption">
                                @include('layouts.viewroommodal')

                    <div class="portfolio-caption">
                    <h4> {{$roomlist->roonname}}  </h4>
                    <p class="text-muted">{{$roomlist->description}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

<!-- Calendar-->
    <section id="calendar" >
        <div class="container">
            <div id='calendar'></div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src='/js/lib/jquery.min.js'></script>
<script src='/js/lib/moment.min.js'></script>
<script src='/js/fullcalendar.min.js'></script>
<script src='/js/jquery.qtip.min.js'></script>
<script src='/js/locale/th.js'></script>
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="js/agency.min.js"></script>

<script>
    $(document).ready(function() {
    // ajax request roomtasks
    $.ajax({
        url: "/calendarroomdata",
    })
        .done(function( data ) {
            // declare variables
            var cameraevents= [];
            var roomevents = [];

            // ajax request cartasks
            $.ajax({
                url: "/calendarcameradata",
            })
                .done(function (camdata) {

                    // loop for keep camera tasks
                    for(var j =0; j < camdata.length; j++)
                    {
                        cameraevents.push( {
                            title: camdata[j].description,
                            description: camdata[j].description,
                            start: camdata[j].start_at,
                            name:camdata[j].user.name,
                            role:camdata[j].user.roles.name,
                            sub_role:camdata[j].user.subroles.name,
                            end: camdata[j].finish_at,
                            backgroundColor: '#28CD52'
                        })
                    }

                    // loop for keep roomtasks
                    for(var i =0; i < data.length; i++)
                    {
                        roomevents.push( {
                            title: data[i].topic,
                            start: data[i].start_at,
                            end: data[i].finish_at,
                            capacity: data[i].capacity,
                            name:data[i].user.name,
                            role:data[i].user.roles.name,
                            sub_role:data[i].user.subroles.name,
                            description: data[i].description,

                            room_id:data[i].roomlist.roomname,
                            eventColor: '#0A7ADD',
                        })

                    }

                        var combine = roomevents.concat(cameraevents);
                        // display
                        $('#calendar').fullCalendar({
                            editable: false,
                            lang:'th',
                            navLinks: true, // can click day/week names to navigate views
                            eventLimit: true, // allow "more" link when too many events
                            header:
                            {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'month,agendaWeek,agendaDay,listMonth'
                            },

                            events: combine,

                            eventRender: function(event, element)
                            {
                                $(element).qtip({
                                    style:{
                                        classes: 'qtip-bootstrap',
                                        textAlign: 'center',
                                    },

                                    content:
                                    {
                                        title: event.room_id,
                                        text:
                                        "<strong>รายละเอียด:</strong> "+event.description+"<br/>"
                                        +"<strong>ผู้จอง:</strong> "+event.name+"<br/>"
                                        +"<strong>กลุ่มภารกิจ:</strong> "+event.role+"<br/>"
                                        +"<strong>สหสาขา:</strong> "+event.sub_role+"<br/>"

                                    },
                                })
                            }
                        });
                    });
            });
    });

</script>

<!-- Portfolio Modal 1 -->
@foreach ($roomlists as $roomlist )
<div class="portfolio-modal modal fade" id="roomModal{{$roomlist->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>{{$roomlist->roomname}}</h2>
                            <p class="item-intro text-muted"></p>
                            <img class="img-responsive img-centered" src="/images/{{$roomlist->image}}"  alt="">
                             <p class="item-intro text-muted">{{$roomlist->description}}</p>

                            @if(count($roomlist->devices))
                                <strong>อุปกรณโสตฯ :</strong>

                                    @foreach($roomlist->devices as$device)
                                        -  {{$device->name}}<br/>

                                    @endforeach

                            @endif

                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> จองห้อง</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

</body>

</html>

