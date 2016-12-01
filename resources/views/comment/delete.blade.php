@extends('layout.main')

@section('title','| DELETE COMMENTS?')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>DELETE THIS COMMENT?</h2>
                <strong>{{$comments->name}}</strong><br>
                <strong>{{$comments->email}}</strong><br>
                <strong>{{$comments->comment}}</strong><br>

                {!! Form::open(['route'=>['comments.destroy',$comments->id],'method'=>'DELETE']) !!}
                    <div class="form-group" style="margin-top: 20px;">
                        {{Form::submit('DELETE COMMENT',['class'=>'btn btn-danger btn-block'])}}
                    </div>
                {!! Form::close() !!}
        </div>
    </div>
@endsection
