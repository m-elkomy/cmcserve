<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PermitsDataTable;
use App\model\Permits;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermitsExport;
use App\Imports\PermitsImport;
class PermitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PermitsDataTable $permits)
    {
        return $permits->render('admin.permits.index',['title'=>trans('admin.Permits Control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permits.create',['title'=>trans('admin.Create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(),[
            'article_text_status_ar'=>'required',
            'article_text_status_en'=>'required',
            'search_keyword_ar'     =>'required',
            'search_keyword_en'     =>'required',
            'permits_type_ar'       =>'required',
            'permits_type_en'       =>'required',
            'permits_name_ar'       =>'required',
            'permits_name_en'       =>'required',
            'article_text_ar'       =>'required',
            'article_text_en'       =>'required',
            'permits_year'          =>'required',
            'permits_number'        =>'required',
            'article_number'        =>'required',
        ],[],[
            'article_text_status_ar'=>trans('admin.article_text_status_ar'),
            'article_text_status_en'=>trans('admin.article_text_status_en'),
            'search_keyword_ar'     =>trans('admin.search_keyword_ar'),
            'search_keyword_en'     =>trans('admin.search_keyword_en'),
            'permits_type_ar'       =>trans('admin.permits_type_ar'),
            'permits_type_en'       =>trans('admin.permits_type_en'),
            'article_text_ar'       =>trans('admin.article_text_ar'),
            'article_text_en'       =>trans('admin.article_text_en'),
            'permits_year'          =>trans('admin.permits_year'),
            'permits_number'        =>trans('admin.permits_number'),
            'article_number'        =>trans('admin.article_number'),
        ]);

        Permits::create($data);
        session()->flash('success',trans('admin.Record Created Successfully'));
        return redirect(aurl('permits'));
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
        $permits = Permits::find($id);
        return view('admin.permits.edit',['title'=>trans('admin.Edit'),'permits'=>$permits]);
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
            'permits_type_ar'=>'required',
            'permits_type_en'=>'required',
            'permits_name_ar'=>'required',
            'permits_name_en'=>'required',
            'article_text_ar'=>'required',
            'article_text_en'=>'required',
            'permits_year'=>'required',
            'permits_number'=>'required',
            'article_number'=>'required',
        ],[],[
            'article_text_status_ar'=>trans('admin.article_text_status_ar'),
            'article_text_status_en'=>trans('admin.article_text_status_en'),
            'search_keyword_ar'=>trans('admin.search_keyword_ar'),
            'search_keyword_en'=>trans('admin.search_keyword_en'),
            'permits_type_ar'=>trans('admin.permits_type_ar'),
            'permits_type_en'=>trans('admin.permits_type_en'),
            'article_text_ar'=>trans('admin.article_text_ar'),
            'article_text_en'=>trans('admin.article_text_en'),
            'permits_year'=>trans('admin.permits_year'),
            'permits_number'=>trans('admin.permits_number'),
            'article_number'=>trans('admin.article_number'),
        ]);
        Permits::where('id',$id)->update($data);
        session()->flash('success',trans('admin.Record Updated Successfully'));
        return redirect(aurl('permits'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permits::find($id)->delete();
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('permits'));
    }

    public function multi_delete(){
        if(is_array(request('item'))){
            Permits::destroy(request('item'));
        }else{
            Permits::find(request('item'))->delete();
        }
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('permits'));
    }

    public function export()
    {
        return Excel::download(new PermitsExport, 'permits.xlsx');
    }

    public function import_view(){
        return view('admin.permits.import',['title'=>trans('admin.Import')]);
    }
    public function import()
    {
        $file = $this->validate(request(),[
            'file'=>'required|mimes:xlsx,csv',
        ],[],[
            'file'=>trans('admin.file'),
        ]);
        Excel::import(new PermitsImport, $file);

        session()->flash('success',trans('admin.Data Imported successfully'));
        return redirect(aurl('permits/import'));
    }

    public function search(){
        if(request()->ajax()){
            if(!empty(request('search')) && request()->has('search')){
                $permits = Permits::where('permits_name_en','LIKE','%'.request('search').'%')->where('id','!=',request('id'))->limit(20)->get();
                return response(['status'=>true,
                    'result'=>count($permits)>0?$permits:'',
                    'count'=>count($permits)],
                    200);
            }
        }
    }

}
