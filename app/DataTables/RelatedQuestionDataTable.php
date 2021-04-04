<?php

namespace App\DataTables;

use App\model\Regulations;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\model\RelatedQuestion;
use DB;
class RelatedQuestionDataTable extends DataTable
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
            ->addColumn('edit', 'admin.related_question.btn.edit')
            ->addColumn('delete', 'admin.related_question.btn.delete')
            ->addColumn('checkbox', 'admin.related_question.btn.checkbox')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
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
//            $reg_name = DB::table('related_regulations')->select(['related_regulations.*','regulations.regulation_name_en'])
//            ->join('regulations','related_regulations.regulations_id','regulations.id')
//            ->get();
//            $rel_reg = DB::table('related_regulations')->select(['related_regulations.*','regulations.regulation_name_en'])
//            ->join('regulations','related_regulations.related_regulations','regulations.id')
//            ->get();
//
//            $all = collect([$rel_reg,$reg_name]);
//            return $all;

        return RelatedQuestion::query()->with(['question','reg_question'])->select('related_questions.*');
//         Regulations::query()->with('related_regulations')->select('regulations.*');
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
                'name'=>'question_id',
                'data'=>'question_id',
                'title'=>trans('admin.question_id')
            ],
            [
                'name'=>'reg_question.question_en',
                'data'=>'reg_question.question_en',
                'title'=>trans('admin.question_name')
            ],
            [
                'name'=>'related_questoin',
                'data'=>'related_questoin',
                'title'=>trans('admin.related_question_id')
            ],
            [
                'name'=>'question.question_en',
                'data'=>'question.question_en',
                'title'=>trans('admin.related_question_en')
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
        return 'RelatedQuestion_' . date('YmdHis');
    }
}
