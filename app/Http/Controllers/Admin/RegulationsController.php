<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\RegulationsDataTable;
use App\model\Regulations;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegulationsExport;
use App\Imports\RegulationsImport;
class RegulationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RegulationsDataTable $regulations)
    {
        return $regulations->render('admin.regulations.index',['title'=>trans('admin.Regulations Control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.regulations.create',['title'=>trans('admin.Create')]);
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
            'article_text_status_ar'=>'required',
            'article_text_status_en'=>'required',
            'search_keyword_ar'=>'required',
            'search_keyword_en'=>'required',
            'regulation_type_ar'=>'required',
            'regulation_type_en'=>'required',
            'regulation_name_ar'=>'required',
            'regulation_name_en'=>'required',
            'article_text_ar'=>'required',
            'article_text_en'=>'required',
            'regulation_year'=>'required',
            'regulation_number'=>'required',
            'article_number'=>'required',
        ],[],[
            'article_text_status_ar'=>trans('admin.article_text_status_ar'),
            'article_text_status_en'=>trans('admin.article_text_status_en'),
            'search_keyword_ar'=>trans('admin.search_keyword_ar'),
            'search_keyword_en'=>trans('admin.search_keyword_en'),
            'regulation_type_ar'=>trans('admin.regulation_type_ar'),
            'regulation_type_en'=>trans('admin.regulation_type_en'),
            'article_text_ar'=>trans('admin.article_text_ar'),
            'article_text_en'=>trans('admin.article_text_en'),
            'regulation_year'=>trans('admin.regulation_year'),
            'regulation_number'=>trans('admin.regulation_number'),
            'article_number'=>trans('admin.article_number'),
        ]);

        Regulations::create($data);
        session()->flash('success',trans('admin.Record Created Successfully'));
        return redirect(aurl('regulations'));
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
        $regulations = Regulations::find($id);
        return view('admin.regulations.edit',['title'=>trans('admin.Edit'),'regulations'=>$regulations]);
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
            'article_text_status_ar'=>'required',
            'article_text_status_en'=>'required',
            'search_keyword_ar'=>'required',
            'search_keyword_en'=>'required',
            'regulation_type_ar'=>'required',
            'regulation_type_en'=>'required',
            'regulation_name_ar'=>'required',
            'regulation_name_en'=>'required',
            'article_text_ar'=>'required',
            'article_text_en'=>'required',
            'regulation_year'=>'required',
            'regulation_number'=>'required',
            'article_number'=>'required',
        ],[],[
            'article_text_status_ar'=>trans('admin.article_text_status_ar'),
            'article_text_status_en'=>trans('admin.article_text_status_en'),
            'search_keyword_ar'=>trans('admin.search_keyword_ar'),
            'search_keyword_en'=>trans('admin.search_keyword_en'),
            'regulation_type_ar'=>trans('admin.regulation_type_ar'),
            'regulation_type_en'=>trans('admin.regulation_type_en'),
            'article_text_ar'=>trans('admin.article_text_ar'),
            'article_text_en'=>trans('admin.article_text_en'),
            'regulation_year'=>trans('admin.regulation_year'),
            'regulation_number'=>trans('admin.regulation_number'),
            'article_number'=>trans('admin.article_number'),
        ]);
        Regulations::where('id',$id)->update($data);
        session()->flash('success',trans('admin.Record Updated Successfully'));
        return redirect(aurl('regulations'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Regulations::find($id)->delete();
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('regulations'));
    }

    public function multi_delete(){
        if(is_array(request('item'))){
            Regulations::destroy(request('item'));
        }else{
            Regulations::find(request('item'))->delete();
        }
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('regulations'));
    }

    public function export()
    {
        return Excel::download(new RegulationsExport, 'regulations.xlsx');
    }

    public function import_view(){
        return view('admin.regulations.import',['title'=>trans('admin.Import')]);
    }
    public function import()
    {
        $file = $this->validate(request(),[
            'file'=>'required|mimes:xlsx,csv',
        ],[],[
            'file'=>trans('admin.file'),
        ]);
        Excel::import(new RegulationsImport,$file);

        session()->flash('success',trans('admin.Data Imported successfully'));
        return redirect(aurl('regulations/import'));
    }

    public function search(){
        if(request()->ajax()){
            if(!empty(request('search')) && request()->has('search')){
                $regulations = Regulations::where('regulation_name_en','LIKE','%'.request('search').'%')->where('id','!=',request('id'))->limit(20)->get();
                return response(['status'=>true,
                    'result'=>count($regulations)>0?$regulations:'',
                    'count'=>count($regulations)],
                    200);
            }
        }
    }

}
