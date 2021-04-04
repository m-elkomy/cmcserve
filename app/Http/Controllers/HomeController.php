<?php

namespace App\Http\Controllers;

use App\Mail\SendMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Newsletter;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.profile');
    }

    public function account_setting(){
        return view('frontend.account_setting');
    }
    public function account_setting_update(){
        $data = $this->validate(request(),[
            'name' => 'required|string|max:8',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
            'mobile' => 'required|string|max:255|unique:users,mobile,'.auth()->user()->id,
            'password' => 'sometimes|nullable|string|min:8',
            'company' => 'required|string|max:255',
            'member_type' => 'required|in:free,gold,silver,Platinum',
        ],[],[
            'name'=>trans('user.name'),
            'email'=>trans('user.email'),
            'mobile'=>trans('user.mobile'),
            'password'=>trans('user.password'),
            'company'=>trans('user.company'),
            'member_type'=>trans('user.member_type')
        ]);

        if(request()->has('password')){
            $data['password'] = bcrypt(request('password'));
        }
        User::where('id',auth()->user()->id)->update($data);
        session()->flash('success',trans('user.data updated successfully'));
        return redirect(url('home'));
    }

    public function profile(){
        return view('frontend.account');
    }

    public function send_message(){
        $data = $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',
        ],[],[
            'name'=>trans('user.name'),
            'email'=>trans('user.email'),
            'subject'=>trans('user.subject'),
            'message'=>trans('user.message')
        ]);

    Mail::to($data['email'])->send(new SendMessage(['data'=>$data]));
    session()->flash('success',trans('user.Message Are Sent'));
    return back();
    }

    public function mailchimp_subscribe(){
        return view('frontend.mailchimp');
    }

    public function mailchimp_subscribe_post(){
        if ( ! Newsletter::isSubscribed(request()->email) ) {
            Newsletter::subscribe(request()->email);
            session()->flash('success',trans('user.Subscribed Successfully'));
            return back();
        }else{
            session()->flash('error',trans('user.This Email is Subscribed'));
            return back();
        }

        return back();

    }
}
