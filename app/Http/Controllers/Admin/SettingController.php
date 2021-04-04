<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UploadController;
class SettingController extends Controller
{
    public function setting(){
        return view('admin.setting',['title'=>trans('admin.Setting')]);
    }

    public function setting_save(){
        $data = $this->validate(request(),[
            'sitename_ar'=>'sometimes|nullable',
            'sitename_en'=>'sometimes|nullable',
            'email'=>'',
            'keyword'=>'',
            'description'=>'',
            'description'=>'',
            'main_lang'=>'',
            'status'=>'',
            'message_maintenance'=>'',
            'logo'=>validate_image(),
            'icon'=>validate_image(),
        ],[],[
            'logo'=>trans('admin.logo'),
            'icon'=>trans('admin.icon'),
        ]);
        if(request()->hasFile('logo')){
            $data['logo']=UploadController::upload([
                'file'=>'logo',
                'path'=>'setting',
                'upload_type'=>'single',
                'delete_file'=>setting()->logo
            ]);
        }
        if(request()->hasFile('icon')){
            $data['icon']=UploadController::upload([
                'file'=>'icon',
                'path'=>'setting',
                'upload_type'=>'single',
                'delete_file'=>setting()->icon
            ]);
        }
        Setting::orderBy('id','desc')->update($data);
        session()->flash('success',trans('admin.Record Updated Successfully'));
        return redirect(aurl('setting'));
    }
}
