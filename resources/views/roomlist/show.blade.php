@extends('layouts.app')
<title></title>
<body>
@section('content')
    <ul>
    <div class="blog-post">
        <h2 class="blog-post-title"> ห้องเรียน/ห้องประชุม:  {{$roomlist->roomname}}  </h2>
        <img src="/images/{{$roomlist->image}}" class="img-rounded" width="1150" height="236">
        <p class="blog-post-meta">อัพเดทเมื่อ : {{$roomlist->updated_at->toFormattedDateString()}} </p>
         <p>รายละเอียด: {{$roomlist->description}}</p>
          {{--Show devices of spicific room--}}
            @if(count($roomlist->devices))
             <p>อุปกรณโสตฯ :</p>
               <ul>
                @foreach($roomlist->devices as $device)
                       <li>{{$device->name}}</li>

                   @endforeach
               </ul>
            @endif
    </div>
    </ul>
@endsection
</body>




