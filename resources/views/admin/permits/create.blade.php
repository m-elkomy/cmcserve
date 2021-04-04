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
                            {!! Form::open(['url'=>aurl('permits')]) !!}
                                <div class="form-group">
                                    {!! Form::label('article_text_status_ar',trans('admin.article_text_status_ar')) !!}
                                    {!! Form::text('article_text_status_ar',old('article_text_status_ar'),['class'=>'form-control border-info border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('article_text_status_en',trans('admin.article_text_status_en')) !!}
                                    {!! Form::text('article_text_status_en',old('article_text_status_en'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('search_keyword_ar',trans('admin.search_keyword_ar')) !!}
                                    {!! Form::text('search_keyword_ar',old('search_keyword_ar'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('search_keyword_en',trans('admin.search_keyword_en')) !!}
                                    {!! Form::text('search_keyword_en',old('search_keyword_en'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('permits_type_ar',trans('admin.permits_type_ar')) !!}
                                    {!! Form::text('permits_type_ar',old('permits_type_ar'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('permits_type_en',trans('admin.permits_type_en')) !!}
                                    {!! Form::text('permits_type_en',old('permits_type_en'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('permits_name_ar',trans('admin.permits_name_ar')) !!}
                                    {!! Form::text('permits_name_ar',old('permits_name_ar'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('permits_name_en',trans('admin.permits_name_en')) !!}
                                    {!! Form::text('permits_name_en',old('permits_name_en'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('article_text_ar',trans('admin.article_text_ar')) !!}
                                    {!! Form::text('article_text_ar',old('article_text_ar'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('article_text_en',trans('admin.article_text_en')) !!}
                                    {!! Form::text('article_text_en',old('article_text_en'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('attachment',trans('admin.attachment')) !!}
                                    {!! Form::file('attachment',['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('permits_year',trans('admin.permits_year')) !!}
                                    {!! Form::text('permits_year',old('permits_year'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('permits_number',trans('admin.permits_number')) !!}
                                    {!! Form::text('permits_number',old('permits_number'),['class'=>'form-control border-info']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('article_number',trans('admin.article_number')) !!}
                                    {!! Form::text('article_number',old('article_number'),['class'=>'form-control border-info']) !!}
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
