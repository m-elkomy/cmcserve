<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\RelatedPermitsDataTable;
use App\model\RelatedPermits;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RelatedPermitsExport;
use App\Imports\RelatedPermitsImport;

class RelatedPermitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RelatedPermitsDataTable $related_permits)
    {
        return $related_permits->render('admin.related_permits.index',['title'=>trans('admin.Related Permits Control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.related_permits.create',['title'=>trans('admin.Create')]);
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
        $id = request('permits_name');
        if($request->has('related_permits')){
            foreach (request('related_permits') as $reg){
                RelatedPermits::create([
                    'permits_id'=>$id,
                    'related_permits'=>$reg,
                ]);
            }
        }

        session()->flash('success',trans('admin.Record Created Successfully'));
        return redirect(aurl('related/permits'));
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
        $related_permits = RelatedPermits::find($id);
        return view('admin.related_permits.edit',['title'=>trans('admin.Edit'),'related_permits'=>$related_permits]);
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
        $reg_name = request('permits_name');
        if($request->has('related_permits') && !empty(request('related_permits'))){
            foreach (request('related_permits') as $reg){
                RelatedPermits::where('id',$id)->update([
                    'permits_id'=>$reg_name,
                    'related_permits'=>$reg,
                ]);
            }
        }else{
            RelatedPermits::where('id',$id)->update(['permits_id'=>$reg_name]);
        }

        session()->flash('success',trans('admin.Record Updated Successfully'));
        return redirect(aurl('related/permits'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RelatedPermits::find($id)->delete();
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('related/permits'));
    }

    public function multi_delete(){
        if(is_array(request('item'))){
            RelatedPermits::destroy(request('item'));
        }else{
            RelatedPermits::find(request('item'))->delete();
        }
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('related/permits'));
    }

    public function export()
    {
        return Excel::download(new RelatedPermitsExport, 'related_permits.xlsx');
    }

    public function import_view(){
        return view('admin.related_permits.import',['title'=>trans('admin.Import')]);
    }
    public function import()
    {
        $file = $this->validate(request(),[
            'file'=>'required|mimes:xlsx,csv',
        ],[],[
            'file'=>trans('admin.file'),
        ]);
        Excel::import(new RelatedPermitsImport,$file);

        session()->flash('success',trans('admin.Data Imported successfully'));
        return redirect(aurl('related/permits/import'));
    }

}
