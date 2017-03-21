
<html>

<head>

    <link href='/css/fullcalendar.min.css' rel='stylesheet' />
    <link href='/css/jquery.qtip.min.css' rel='stylesheet' />
    <link href='/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='/js/lib/moment.min.js'></script>
    <script src='/js/lib/jquery.min.js'></script>
    <script src='/js/fullcalendar.min.js'></script>
    <script src='/js/jquery.qtip.min.js'></script>
    <script src='/js/locale/th.js'></script>

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
//                            show: 'click',
//                            hide:'click'

                        })
                    }

                    });

                });
            });
        });

    </script>

    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>
</head>
<body>


<div id='calendar'></div>


</body>
</html>
