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
                            {!! Form::open(['url'=>aurl('users')]) !!}
                                <div class="form-group">
                                    {!! Form::label('name',trans('admin.Name')) !!}
                                    {!! Form::text('name',old('name'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email',trans('admin.Email')) !!}
                                    {!! Form::email('email',old('email'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password',trans('admin.Password')) !!}
                                    {!! Form::password('password',['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('mobile',trans('admin.Mobile')) !!}
                                    {!! Form::text('mobile',old('mobile'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('member_type',trans('admin.Member Type')) !!}
                                    {!! Form::select('member_type',['gold'=>trans('admin.gold'),'silver'=>trans('admin.silver'),'Platinum'=>trans('admin.Platinum')],
                                        old('member_type'),['class'=>'form-control border-info','placeholder'=>'...............']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('company',trans('admin.Company')) !!}
                                    {!! Form::text('company',old('company'),['class'=>'form-control border-info']) !!}
                                </div>
                            {!! Form::submit(trans('admin.Save'),['class'=>'btn btn-success']) !!}
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
