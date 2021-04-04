@section('title')
    {{!empty($title) ? $title : trans('admin.Admin Panel')}}
@endsection
@extends('layouts.main')
@section('style')
    <!-- DataTables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
    <!-- Start Contentbar -->
    <div class="contentbar">
    @include('admin.message')

    <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">{{$title}}</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle">{{$title}}</h6>
                        <div class="table-responsive">
                            {!! Form::open(['url'=>aurl('setting'),'files'=>true]) !!}
                                <div class="form-group">
                                    {!! Form::label('sitename_ar',trans('admin.sitename_ar')) !!}
                                    {!! Form::text('sitename_ar',setting()->sitename_en,['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('sitename_en',trans('admin.sitename_en')) !!}
                                    {!! Form::text('sitename_en',setting()->sitename_en,['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email',trans('admin.Email')) !!}
                                    {!! Form::email('email',setting()->email,['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('logo',trans('admin.logo')) !!}
                                    {!! Form::file('logo',['class'=>'form-control border-info']) !!}
                                </div>
                                @if(!empty(setting()->logo))
                                    <img src="{{\Illuminate\Support\Facades\Storage::url(setting()->logo)}}" width="100px" height="100px">
                                    @endif
                                <div class="form-group">
                                    {!! Form::label('icon',trans('admin.icon')) !!}
                                    {!! Form::file('icon',['class'=>'form-control border-info']) !!}
                                </div>
                                @if(!empty(setting()->icon))
                                    <img src="{{\Illuminate\Support\Facades\Storage::url(setting()->icon)}}" width="100px" height="100px">
                                @endif
                                <div class="form-group">
                                    {!! Form::label('description',trans('admin.Description')) !!}
                                    {!! Form::textarea('description',setting()->description,['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('keyword',trans('admin.Keyword')) !!}
                                    {!! Form::textarea('keyword',setting()->keyword,['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('main_lang',trans('admin.Main Language')) !!}
                                    {!! Form::select('main_lang',['ar'=>trans('admin.Arabic'),'en'=>trans('admin.English')],setting()->main_lang,['class'=>'form-control border-info','placeholder'=>'.........']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('status',trans('admin.Status')) !!}
                                    {!! Form::select('status',['open'=>trans('admin.Open'),'close'=>trans('admin.Close')],setting()->status,['class'=>'form-control border-info','placeholder'=>'............']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('message_maintenance',trans('admin.Maintenance Message')) !!}
                                    {!! Form::textarea('message_maintenance',setting()->message_maintenance,['class'=>'form-control border-info']) !!}
                                </div>
                            {!! Form::submit(trans('admin.Update'),['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@section('script')
    <!-- Datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-table-datatable.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('vendor/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/myfunction.js') }}"></script>

@endsection
