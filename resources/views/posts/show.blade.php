@extends('layout.main')
@section('title','| Show Post')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{asset('images/'.$post->images)}}" alt="post photo" width="50%">
                </div>
            </div>

            <h1>{{$post->title}}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="label label-default">{{$tag->name}}</span>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Comment: <small>{{$post->comments()->count()}} Post</small>

                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th width="70px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($post->comments as $comment)
                            <tr>
                                <th>{{$comment->id}}</th>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->email}}</td>
                                <td>{{$comment->comment }}</td>
                                <td>
                                    <a href="{{route('comments.edit',$comment->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="{{route('comments.delete',$comment->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>URL :</label>
                    <p><a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Category :</label>
                    <p>{{$post->category->name}}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated :</label>
                    <p>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=> 'DELETE']) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            {!! Html::linkRoute('posts.index','<< See All Post >>',array(),array('class'=>'btn btn-default btn-block','style'=>'margin-top:10px')) !!}
                        </div>
                    </div>
                </div>
                {{--<div class="row">
                    {{Html::linkRoute('')}}
                </div>--}}
            </div><!-- end.well-->
        </div>
    </div>
@endsection