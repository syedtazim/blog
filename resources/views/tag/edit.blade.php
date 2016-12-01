@extends('layout.main')

@section('title','| Edit Tags')

@section('content')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <h2>Edit Tag</h2>
            <div class="well">
                {!! Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'PUT']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Tag Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Save Changes',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection