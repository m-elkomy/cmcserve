<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Imports\UserImport;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $user)
    {
        return $user->render('admin.users.index',['title'=>trans('admin.Users Control')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',['title'=>trans('admin.Create')]);
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
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'mobile'=>'required|numeric',
            'member_type'=>'required|in:gold,silver,Platinum',
            'company'=>'required|string',
        ],[],[
            'name'=>trans('admin.Name'),
            'email'=>trans('admin.Email'),
            'password'=>trans('admin.Password'),
            'mobile'=>trans('admin.Mobile'),
            'member_type'=>trans('admin.Member Type'),
            'company'=>trans('admin.Company'),
        ]);

        $data['password'] = bcrypt(request('password'));
        User::create($data);
        session()->flash('success',trans('admin.Record Created Successfully'));
        return redirect(aurl('users'));
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
        $user = User::find($id);
        return view('admin.users.edit',['title'=>trans('admin.Edit'),'user'=>$user]);
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
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'sometimes|nullable|min:6',
            'mobile'=>'required|numeric',
            'member_type'=>'required|in:gold,silver,Platinum',
            'company'=>'required|string',
        ],[],[
            'name'=>trans('admin.Name'),
            'email'=>trans('admin.Email'),
            'password'=>trans('admin.Password'),
            'mobile'=>trans('admin.Mobile'),
            'member_type'=>trans('admin.Member Type'),
            'company'=>trans('admin.Company'),
        ]);

        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }
        User::where('id',$id)->update($data);
        session()->flash('success',trans('admin.Record Updated Successfully'));
        return redirect(aurl('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('users'));
    }

    public function multi_delete(){
        if(is_array(request('item'))){
            User::destroy(request('item'));
        }else{
            User::find(request('item'))->delete();
        }
        session()->flash('success',trans('admin.Record Deleted Successfully'));
        return redirect(aurl('users'));
    }

    public function export()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function import_view(){
        return view('admin.users.import',['title'=>trans('admin.Import')]);
    }
    public function import()
    {
        $file = $this->validate(request(),[
            'file'=>'required|mimes:xlsx,csv',
        ],[],[
            'file'=>trans('admin.file'),
        ]);
        Excel::import(new UserImport, $file);

        session()->flash('success',trans('admin.Data Imported successfully'));
        return redirect(aurl('users/import'));
    }

}
