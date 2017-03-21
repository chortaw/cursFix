@section('content')
    <h1>Book Room</h1>

    {!! Form::open(['url'=>'roomtasks']) !!}

    {{ csrf_field() }}

    <div class="form-group">
        <label for="roomname">Room name:</label>
        {!!   Form::select('roomname', [1414, 2105, 3102], null, ['class' => 'field']) !!}
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        {!! Form::textarea('description',null,['clsss'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit($submitButtonText,['clsss'=>'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

@stop