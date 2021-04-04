<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_admin{{ $id }}"><i class="fa fa-trash"></i> </button>

<!-- Modal -->
<div id="del_admin{{ $id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{trans('admin.Delete')}}</h4>
            </div>
            {!! Form::open(['route'=>['permits.destroy',$id],'method'=>'delete']) !!}
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h4>{{trans('admin.Are Your Want To Delete This item')}}</h4>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.Close')}}</button>
                {!! Form::submit(trans('admin.Delete'),['class'=>'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}

        </div>

    </div>
</div>
