@extends('layout.main')

@section('title','| Login')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">Login</h2>
            {!! Form::open() !!}
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::checkbox('remember') !!} {!! Form::label('remember', 'Remember Me') !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Login',['class'=>'btn btn-primary']) !!}
                <a class="btn btn-link" href="{{url('password/reset')}}">
                    Forgot Your Password?
                </a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection