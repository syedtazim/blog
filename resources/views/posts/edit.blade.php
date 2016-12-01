@extends('layout.main')
@section('title','| Edit Post')

@section('css')
    {{Html::style('css/select2.min.css')}}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            menubar: false
        });
    </script>
@endsection

@section('content')
    <div class="row">
        {!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT','files'=>true]) !!}
        <div class="col-md-8">
            <div class="form-group">
            {{ Form::label('title','Title:') }}
            {{ Form::text('title',null,['class'=>'form-control']) }}
            </div>
            <div class="form-group ">
                {{Form::label('slug','Slug:')}}
                {{Form::text('slug',null,['class'=>'form-control'])}}
            </div>
            <div class="form-group ">
                {{Form::label('category_id','Category:')}}
                {{Form::select('category_id',$categories,null,['class'=>'form-control'])}}
            </div>
            <div class="form-group ">
                {{Form::label('tags','Tag:')}}
                {{Form::select('tags[]',$tags2,null,['class'=>'form-control select-multiple','multiple'=> 'multiple'])}}
            </div>
            <div class="form-group">
                {{Form::label('','Old Photo:')}}
                <img src="{{asset('images/'.$post->images)}}" alt="Old photo" width="100px" height="50px">
            </div>
            <div class="form-group">
                {{Form::label('featured_image','Update Photo:')}}
                {{Form::file('featured_image',['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{ Form::label('body','Post Body:') }}
                {{ Form::textarea('body',null,['class'=>'form-control']) }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Crated At :</dt>
                    <dd>{{date('M j, Y h:ia',strtotime($post->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated :</dt>
                    <dd>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-md-6">
                        {{Form::submit('Save Changes',['class'=>'btn btn-success btn-block'])}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        {!! Html::linkRoute('posts.index','<< See All Post >>',array(),array('class'=>'btn btn-default btn-block','style'=>'margin-top:10px')) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('js')
    {{Html::script('js/select2.min.js')}}
    <script type="text/javascript">
        $(".select-multiple").select2();
        $(".select-multiple").select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
    </script>
@endsection