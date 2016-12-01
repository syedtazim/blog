@extends('layout.main')
<?php $titleTag = htmlspecialchars($post->title)?>
@section('title',"| $titleTag")

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
            <img src="{{asset('images/'.$post->images)}}" alt="Post Images">
            <h1>{{$post->title}}</h1>
            <p>{!! $post->body !!}</p>
            <strong>Category :</strong> {{$post->category->name}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span> {{$post->comments()->count()}} Comment </h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{asset('images/download.jpg')}}" alt="Author Image " class="author-image">
                        <div class="author-name">
                            <h4>{{$comment->name}}</h4>
                            <div class="author-time">
                                <p>{{date('M nS, Y - g:iA',strtotime($comment->created_at))}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{$comment->comment}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="well col-md-6 col-md-offset-3" style="margin-top:20px;" id="comment_form">
            {!! Form::open(['route'=>['comments.store',$post->id],'method'=>'POST']) !!}
                <div class="row">
                <div class="col-md-5">
                    {{Form::label('name','Name:')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                </div>
                <div class="col-md-7">
                    {{Form::label('email','Email:')}}
                    {{Form::email('email',null,['class'=>'form-control'])}}
                </div>
                </div>
                <div class="form-group">
                    {{Form::label('comment','Comment:')}}
                    {{Form::textarea('comment',null,['class'=>'form-control','rows'=> 5])}}
                </div>
                <div class="form-group">
                    {{Form::submit('Add Comment',['class'=>'btn btn-primary pull-right'])}}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection