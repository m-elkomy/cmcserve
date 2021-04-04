<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use Illuminate\Http\Request;
use App\Admin;
use DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function do_login(){
        $remember_me = request('remember_me') == 1 ? true : false;
        if(admin()->attempt(['email'=>request('email'),'password'=>request('password')],$remember_me)){
            return redirect('admin_panel');
        }else{
            session()->flash('error',trans('admin.Error In Login Information'));
            return redirect(aurl('login'));
        }
    }

    public function logout(){
        admin()->logout();
        return redirect(aurl('login'));
    }

    public function forget_password(){
        return view('admin.forget_password');
    }

    public function forget_password_post(){
        $admin = Admin::where('email',request('email'))->first();
        if(!empty($admin)){
            $token = app('auth.password.broker')->createToken($admin);
            DB::table('password_resets')->insert([
                'email'=>$admin->email,
                'token'=>$token,
                'created_at'=>Carbon::now()
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
            session()->flash('success',trans('admin.Reset Password Link Sent Successfully'));
            return back();
        }else{
            return back();
        }
    }

    public function reset_password($token){
        $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check_token)){
            return view('admin.reset_password',['data'=>$check_token]);
        }else{
            return redirect(aurl('forget/password'));
        }
    }


    public function reset_password_final($token){
        $this->validate(request(),[
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ],[],[
            'password'=>trans('admin.Password'),
            'password_confirmation'=>trans('admin.password_confirmation')
        ]);
        $check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check_token)){
            $admin = Admin::where('email',$check_token->email)->update(['email'=>$check_token->email,'password'=>bcrypt(request('password'))]);
            DB::table('password_resets')->where('email',$check_token->email)->delete();
            admin()->attempt(['email'=>request('email'),'password'=>request('password')],true);
            return redirect(aurl());
        }else{
            return redirect(aurl('forget/password'));
        }
    }
}
