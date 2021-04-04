@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{trans('user.MailChimp')}}</div>

                    <div class="card-body">
                        @include('layouts.message')
                        <form method="post">

                            <div class="form-group">
                                <label for="exampleInputEmail">{{trans('user.email')}}</label>
                                <input type="email" name="email"class="form-control">
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">{{trans('user.subscribe')}}</button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
