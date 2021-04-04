<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\AdminDataTable;
use App\Admin;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdminExport;
use App\Imports\AdminImport;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDataTable $admin)
    {
        return $admin->render('admin.admins.index',['title'=>trans('admin.Admins Control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create',['title'=>trans('admin.Create')]);
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
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6',
        ],[],[
            'name'=>trans('admin.Name'),
            'email'=>trans('admin.Email'),
            'password'=>trans('admin.Password'),
        ]);

        $data['password'] = bcrypt(request('password'));
        Admin::create($data);
        session()->flash('success',trans('admin.Record Created Successfully'));
        return redirect(aurl('admins'));
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
        $admin = Admin::find($id);
        return view('admin.admins.edit',['title'=>trans('admin.Edit'),'admin'=>$admin]);
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
            'name'=>'required',
            'email'=>'required|email|unique:admins,email,'.$id,
            'password'=>'sometimes|nullable|min:6',
        ],[],[
            'name'=>trans('admin.Name'),
            'email'=>trans('admin.Email'),
            'password'=>trans('admin.Password'),
        ]);

        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }
        Admin::where('id',$id)->update($data);
        session()->flash('success',trans('admin.Record Updated Successfully'));
        return redirect(aurl('admins'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('admins'));
    }

    public function multi_delete(){
        if(is_array(request('item'))){
            Admin::destroy(request('item'));
        }else{
            Admin::find(request('item'))->delete();
        }
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('admins'));
    }

    public function export()
    {
        return Excel::download(new AdminExport, 'admins.xlsx');
    }

    public function import_view(){
        return view('admin.admins.import',['title'=>trans('admin.Import')]);
    }
    public function import()
    {
        $file = $this->validate(request(),[
            'file'=>'required|mimes:xlsx,csv',
        ],[],[
            'file'=>trans('admin.file'),
        ]);
        Excel::import(new AdminImport, $file);

        session()->flash('success',trans('admin.Data Imported successfully'));
        return redirect(aurl('admins/import'));
    }

}
