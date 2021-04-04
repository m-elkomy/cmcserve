<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\model\AssessmentQuestion;
use Illuminate\Http\Request;
use App\DataTables\AssessmentQuestionDataTable;
use App\model\Regulations;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AssessmentQuestionExport;
use App\Imports\AssessmentQuestionImport;
class AssessmentQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AssessmentQuestionDataTable $question)
    {
        return $question->render('admin.assessment_question.index',['title'=>trans('admin.Assessment Question Control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.assessment_question.create',['title'=>trans('admin.Create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $this->validate(request(),[
            'question_ar'=>'required',
            'question_en'=>'required',
            'answer_ar'=>'required',
            'answer_en'=>'required',
        ],[],[
            'question_ar'=>trans('admin.question_ar'),
            'question_en'=>trans('admin.question_en'),
            'answer_ar'=>trans('admin.answer_ar'),
            'answer_en'=>trans('admin.answer_en'),
        ]);

        AssessmentQuestion::create($data);
        session()->flash('success',trans('admin.Record Created Successfully'));
        return redirect(aurl('question'));
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
        $question = AssessmentQuestion::find($id);
        return view('admin.assessment_question.edit',['title'=>trans('admin.Edit'),'question'=>$question]);
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
        $data= $this->validate(request(),[
            'question_ar'=>'required',
            'question_en'=>'required',
            'answer_ar'=>'required',
            'answer_en'=>'required',
        ],[],[
            'question_ar'=>trans('admin.question_ar'),
            'question_en'=>trans('admin.question_en'),
            'answer_ar'=>trans('admin.answer_ar'),
            'answer_en'=>trans('admin.answer_en'),
        ]);
        AssessmentQuestion::where('id',$id)->update($data);
        session()->flash('success',trans('admin.Record Updated Successfully'));
        return redirect(aurl('question'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AssessmentQuestion::find($id)->delete();
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('question'));
    }

    public function multi_delete(){
        if(is_array(request('item'))){
            AssessmentQuestion::destroy(request('item'));
        }else{
            AssessmentQuestion::find(request('item'))->delete();
        }
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('question'));
    }

    public function export()
    {
        return Excel::download(new AssessmentQuestionExport, 'assessment_question.xlsx');
    }

    public function import_view(){
        return view('admin.assessment_question.import',['title'=>trans('admin.Import')]);
    }
    public function import()
    {
        $file = $this->validate(request(),[
            'file'=>'required|mimes:xlsx,csv',
        ],[],[
            'file'=>trans('admin.file'),
        ]);
        Excel::import(new AssessmentQuestionImport, $file);

        session()->flash('success',trans('admin.Data Imported successfully'));
        return redirect(aurl('question/import'));
    }

    public function search(){
        if(request()->ajax()){
            if(!empty(request('search')) && request()->has('search')){
                $question = AssessmentQuestion::where('question_en','LIKE','%'.request('search').'%')->where('id','!=',request('id'))->limit(20)->get();
                return response(['status'=>true,
                    'result'=>count($question)>0?$question:'',
                    'count'=>count($question)],
                    200);
            }
        }
    }

}
