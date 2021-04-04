<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\RelatedRegulationDataTable;
use App\model\RelatedRegulations;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RelatedRegulationsExport;
use App\Imports\RelatedRegulationsImport;

class RelatedRegulationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RelatedRegulationDataTable $related_regulations)
    {
        return $related_regulations->render('admin.related_regulations.index',['title'=>trans('admin.Related Regulations Control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.related_regulations.create',['title'=>trans('admin.Create')]);
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
        $id = request('regulations_name');
        if($request->has('related_regulations')){
            foreach (request('related_regulations') as $reg){
                RelatedRegulations::create([
                    'regulations_id'=>$id,
                    'related_regulations'=>$reg,
                ]);
            }
        }

        session()->flash('success',trans('admin.Record Created Successfully'));
        return redirect(aurl('related/regulations'));
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
        $related_regulations = RelatedRegulations::find($id);
        return view('admin.related_regulations.edit',['title'=>trans('admin.Edit'),'related_regulations'=>$related_regulations]);
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
        $reg_name = request('regulations_name');
        if($request->has('related_regulations') && !empty(request('related_regulations'))){
            foreach (request('related_regulations') as $reg){
                RelatedRegulations::where('id',$id)->update([
                    'regulations_id'=>$reg_name,
                    'related_regulations'=>$reg,
                ]);
            }
        }else{
            RelatedRegulations::where('id',$id)->update(['regulations_id'=>$reg_name]);
        }

        session()->flash('success',trans('admin.Record Updated Successfully'));
        return redirect(aurl('related/regulations'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RelatedRegulations::find($id)->delete();
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('related/regulations'));
    }

    public function multi_delete(){
        if(is_array(request('item'))){
            RelatedRegulations::destroy(request('item'));
        }else{
            RelatedRegulations::find(request('item'))->delete();
        }
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('related/regulations'));
    }

    public function export()
    {
        return Excel::download(new RelatedRegulationsExport, 'related_regulations.xlsx');
    }

    public function import_view(){
        return view('admin.related_regulations.import',['title'=>trans('admin.Import')]);
    }
    public function import()
    {
        $file = $this->validate(request(),[
            'file'=>'required|mimes:xlsx,csv',
        ],[],[
            'file'=>trans('admin.file'),
        ]);
        Excel::import(new RelatedRegulationsImport, $file);

        session()->flash('success',trans('admin.Data Imported successfully'));
        return redirect(aurl('related/regulations/import'));
    }

}
