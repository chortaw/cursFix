@extends('layouts.app')


<body>

@section('content')
    <h1> &nbsp รายละเอียดยานพาหนะในระบบ</h1>

        @foreach($roomlist as $roomlists)

            <div class="col-md-4">
                <a href="roomlist/{{$roomlists->id}}">

                    <div class="blog-post" >

                        <h2 class="blog-post-title" > {{$roomlists->roonname}}  </h2>
                        <img src="/images/{{$roomlists->image}}" class="img-rounded" width="304" height="236">

                        <p class="blog-post-meta">อัพเดทล่าสุด: {{$roomlists->updated_at->toFormattedDateString()}} </p>
                        <p>รายละเอียด: {{$roomlists->description}}</p>

                    </div>
                </a>
            </div>


        @endforeach
        @endsection
</body>

