<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\RelatedQuestionDataTable;
use App\model\RelatedQuestion;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RelatedQuestionExport;
use App\Imports\RelatedQuestionImport;

class RelatedQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RelatedQuestionDataTable $related_question)
    {
        return $related_question->render('admin.related_question.index',['title'=>trans('admin.Related Question Control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.related_question.create',['title'=>trans('admin.Create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return request('related_regulations');
        $id = request('question_en');

        if($request->has('related_question')){

            foreach (request('related_question') as $reg){
                RelatedQuestion::create([
                    'question_id'=>$id,
                    'related_questoin'=>$reg,
                ]);
            }
        }

        session()->flash('success',trans('admin.Record Created Successfully'));
        return redirect(aurl('related/question'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $related_question = RelatedQuestion::find($id);
        return view('admin.related_question.edit',['title'=>trans('admin.Edit'),'related_question'=>$related_question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reg_name = request('question_en');

        if($request->has('related_question') && !empty(request('related_question'))){
            foreach (request('related_question') as $reg){
                RelatedQuestion::where('id',$id)->update([
                    'question_id'=>$reg_name,
                    'related_questoin'=>$reg,
                ]);
            }
        }else{
            RelatedQuestion::where('id',$id)->update(['question_id'=>$reg_name]);
        }

        session()->flash('success',trans('admin.Record Updated Successfully'));
        return redirect(aurl('related/question'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RelatedQuestion::find($id)->delete();
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('related/question'));
    }

    public function multi_delete(){
        if(is_array(request('item'))){
            RelatedQuestion::destroy(request('item'));
        }else{
            RelatedQuestion::find(request('item'))->delete();
        }
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('related/question'));
    }

    public function export()
    {
        return Excel::download(new RelatedQuestionExport, 'related_question.xlsx');
    }

    public function import_view(){
        return view('admin.related_question.import',['title'=>trans('admin.Import')]);
    }
    public function import()
    {
        $file = $this->validate(request(),[
            'file'=>'required|mimes:xlsx,csv',
        ],[],[
            'file'=>trans('admin.file'),
        ]);
        Excel::import(new RelatedQuestionImport, $file);

        session()->flash('success',trans('admin.Data Imported successfully'));
        return redirect(aurl('related/question/import'));
    }

}
