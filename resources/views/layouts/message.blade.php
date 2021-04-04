@if(session()->has('success'))

    <div class="alert alert-success">
        <h4>{{session('success')}}</h4>
    </div>
    @endif


@if(session()->has('error'))

    <div class="alert alert-danger">
        <h4>{{session('error')}}</h4>
    </div>
    @endif


@if($errors->all())

    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
            @endforeach
    </div>
    @endif
