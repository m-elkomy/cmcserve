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
                            {!! Form::open(['id'=>'form_data','url'=>aurl('regulations/destroy/all'),'method'=>'delete']) !!}
                            {!! $dataTable->table(['class'=>'table table-striped table-bordered dt-responsive']) !!}
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

    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div id="multiple_delete" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{trans('admin.Delete')}}</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <div class="empty_record d-none">
                            <h4>{{trans('admin.Please Check Some Records')}}</h4>
                        </div>
                        <div class="not_empty_record d-none">
                            <h4>{{trans('admin.Ask Delete Item')}} <span class="record_count"></span> ?</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record d-none">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.Close')}}</button>
                    </div>
                    <div class="not_empty_record d-none">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.Close')}}</button>
                        <input type="submit" class="btn btn-danger del_all" name="del_all" value="{{trans('admin.Delete')}}">
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('script')
    {!! $dataTable->scripts() !!}

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
    <script>delete_all()</script>

@endsection
