@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
 <body>
 @section('content')
   <ul>
    @foreach($roomtasks as $roomtask)

     <li>

         <a href="/roomtasks/{{$roomtask->id}}">


            <div class="blog-post">

                <h2 class="blog-post-title"> {{$roomtask->roomname}}  </h2>

                <p class="blog-post-meta">จองเมื่อ: {{$roomtask->created_at->toFormattedDateString()}}  <a>โดย: {{$roomtask->user->name}}</a></p>
                {{$roomtask->description}}

            </div>
         </a>

     </li>

    @endforeach
   </ul>
     @endsection
  </body>

</html>
