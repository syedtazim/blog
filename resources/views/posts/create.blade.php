@extends('layout.main')

@section('title','| Create New Post')

@section('css')
    {{Html::style('css/select2.min.css')}}
    {{--{{Html::script('js/jquery.min.js')}}
    {{Html::script('js/jquery.tinymce.min.js')}}--}}
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
        <div class="col-md-6 col-md-offset-3">
            <h1>Create Post</h1>
            {!! Form::open(['route'=>'posts.store','files'=> true]) !!}
                <div class="form-group {{$errors->has('title') ? 'has-error': ''}}">
                {{Form::label('title','Title:')}}
                {{Form::text('title',null,['class'=>'form-control','placeholder'=>'Title Write Here'])}}
                </div>
                <div class="form-group {{$errors->has('slug') ? 'has-error': ''}}">
                    {{Form::label('slug','Slug:')}}
                    {{Form::text('slug',null,['class'=>'form-control'])}}
                </div>
                <div class="form-group {{$errors->has('category') ? 'has-error': ''}}">
                    {{Form::label('category_id','Category:')}}
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group {{$errors->has('category') ? 'has-error': ''}}">
                    {{Form::label('tags','Tag:')}}
                    <select class="form-control select-multiple" name="tags[]" multiple="multiple">
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{Form::label('featured_image')}}
                    {{Form::file('featured_image',['class'=>'form-control'])}}
                </div>
                <div class="form-group {{$errors->has('body') ? 'has-error': ''}}">
                {{Form::label('body','Post Body:')}}
                {{Form::textarea('body',null,array('class'=>'form-control','placeholder'=>'body Write Here'))}}
                </div>
                <div class="form-group">
                    {{Form::submit('Create Post',array('class'=>'btn btn-success btn-block'))}}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
    {{Html::script('js/select2.min.js')}}
    <script type="text/javascript">
        $(".select-multiple").select2();
    </script>

@endsection