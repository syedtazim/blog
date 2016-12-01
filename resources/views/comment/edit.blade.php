@extends('layout.main')

@section('title','| Edit Comment')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Edit Comments</h2>
            {!! Form::model($comments,['route'=>['comments.update',$comments->id], 'method'=>'PUT']) !!}
            <div class="form-group">
                {{Form::label('name','Name:')}}
                {{Form::text('name',null,['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('email','Email:')}}
                {{Form::email('email',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('comment','Comment:')}}
                {{Form::textarea('comment',null,['class'=>'form-control','rows'=> 5])}}
            </div>
            <div class="form-group">
                {{Form::submit('Update Comment',['class'=>'btn btn-success pull-right'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
