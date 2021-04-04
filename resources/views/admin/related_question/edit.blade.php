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
                            {!! Form::open(['url'=>aurl('related/question/'.$related_question->id),'method'=>'put']) !!}
                                <div class="form-group">
                                    {!! Form::label('question_en',trans('admin.question_en')) !!}
                                    {!! Form::select('question_en',App\model\AssessmentQuestion::pluck('question_en','id'),$related_question->question_id,['class'=>'form-control border-info reg_id']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('related_question',trans('admin.related_question')) !!}
                                    <div class="active-purple-3 active-purple-4 mb-4 border-l">
                                        <i class="fa fa-spin fa-spinner d-none loading_data"></i>
                                        <i class="fa fa-search do_search"></i>
                                        <input class="form-control border-info search" name="related_question" type="text" placeholder="Search" aria-label="Search">
                                    </div>
                                    <div class="col-lg-12">
                                        <ul class="items">

                                        </ul>
                                    </div>
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
    <script>
        $(document).on('click','.do_search',function () {
            var search = $('.search').val();
            var id = $('.reg_id').val();

            if(search != '' || search !== null){
                $.ajax({
                    url:'{{aurl('question/search')}}',
                    dataType:'json',
                    type:'post',
                    data:{_token:'{{csrf_token()}}',search:search,id:id},
                    beforeSend:function () {
                        $('.loading_data').removeClass('d-none');
                    },success:function(data){
                        if(data.status == true){
                            if(data.count>0){
                                var items = '';
                                $.each(data.result,function (index,value) {
                                    items += '<li><label><input type="checkbox" name="related_question[]" value="'+value.id+'">'+value.question_en+'<label></li>';
                                });
                                $('.items').html(items);
                            }
                        }
                        $('.loading_data').addClass('d-none');
                    },error:function (data) {

                    }
                })
            }
        })
    </script>
@endsection
