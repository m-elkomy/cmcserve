<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Admin;
class AdminDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('edit', 'admin.admins.btn.edit')
            ->addColumn('delete', 'admin.admins.btn.delete')
            ->addColumn('checkbox', 'admin.admins.btn.checkbox')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\AdminDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Admin::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters([
                        'dom'=>'Blfrtip',
                        'lengthMenu'=>[[10,25,50,100,-1],[10,25,50,100,trans('admin.All Record')]],
                        'buttons'=>[
                            ['extend'=>'create','className'=>'btn btn-success','text'=>'<i class="ti-plus"></i>'],
                            ['extend'=>'print','className'=>'btn btn-dark','text'=>'<i class="ri-printer-cloud-fill"></i>'],
                            ['extend'=>'reload','className'=>'btn btn-default','text'=>'<i class="ri-refresh-fill"></i>'],
                            [
                                'text'=>trans('admin.Export'),
                                'className'=>'btn btn-light',
                                'action'=>"function(){
                                    window.location.href='".\URL::current()."/export'
                                }"
                            ],[
                                'text'=>trans('admin.Import'),
                                'className'=>'btn btn-secondary',
                                'action'=>"function(){
                                    window.location.href='".\URL::current()."/import'
                                }"
                            ],
                            [
                                'text'=>'<i class="fa fa-trash"></i>',
                                'className'=>'btn btn-danger delBtn'
                            ]
                        ],
                        'language'=>datatable_lang()

                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>trans('admin.ID')
            ],
            [
                'name'=>'name',
                'data'=>'name',
                'title'=>trans('admin.Name')
            ],
            [
                'name'=>'email',
                'data'=>'email',
                'title'=>trans('admin.Email')
            ],
            [
                'name'=>'checkbox',
                'data'=>'checkbox',
                'title'=>'<input type="checkbox" class="check_all" onclick="check_all()">',
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
                'exportable'=>false
            ],
            [
                'name'=>'edit',
                'data'=>'edit',
                'title'=>trans('admin.Edit'),
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
                'exportable'=>false
            ],
            [
                'name'=>'delete',
                'data'=>'delete',
                'title'=>trans('admin.Delete'),
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
                'exportable'=>false
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}
