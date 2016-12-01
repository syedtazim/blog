@if(Session::has('success'))
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="alert alert-success">
         <strong>Status:</strong> {{Session::get('success')}}
        </div>
    </div>
</div>
@endif

@if(count($errors))
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-danger">
                <strong>Errors:</strong>
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
