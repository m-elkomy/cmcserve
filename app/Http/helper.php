<?php

if(!function_exists('aurl')){
    function aurl($url=null){
        return url('admin_panel/'.$url);
    }
}


if(!function_exists('admin')){
    function admin(){
        return auth()->guard('admin');
    }
}

if(!function_exists('lang')){
    function lang(){
        if(session()->has('lang')){
            return session('lang');
        }else{
            session()->put('lang','en');
            return setting()->main_lang;
        }
    }
}

if(!function_exists('front_lang')){
    function front_lang(){
        if(session()->has('front_lang')){
            return session('front_lang');
        }else{
          return  session()->put('front_lang','en');
        }
    }
}

if(!function_exists('direction')){
    function direction(){
        if(session()->has('lang')){
            if(session('lang') == 'ar'){
                return 'rtl';
            }else{
                return 'ltr';
            }
        }else{
            return 'ltr';
        }
    }
}

if(!function_exists('front_direction')){
    function front_direction(){
        if(session()->has('front_lang')){
            if(session('front_lang') == 'ar'){
                return 'rtl';
            }else{
                return 'ltr';
            }
        }else{
            return 'ltr';
        }
    }
}

if(!function_exists('datatable_lang')){
    function datatable_lang(){
        return [
            "sProcessing"=> trans('admin.Processing'),
            "sLengthMenu"=> trans('admin.Length Menu'),
            "sEmptyTable"=> trans('admin.Empty Table'),
            "sInfo"=> trans('admin.Info'),
            "sInfoEmpty"=> trans('admin.Info Empty'),
            "sInfoFiltered"=> trans('admin.Info Filtered'),
            "sInfoPostFix"=> "",
            "sSearch"=> trans('admin.Search'),
            "sUrl"=> "",
            "sInfoThousands"=> ",",
            "sLoadingRecords"=> trans('admin.Loading Records'),
            "oPaginate"=> [
                "sFirst"=> trans('admin.First'),
                "sLast"=> trans('admin.Last'),
                "sNext"=> trans('admin.Next'),
                "sPrevious"=> trans('admin.Previous')
            ],
            "oAria"=> [
                "sSortAscending"=> trans('admin.Sort Ascending'),
                "sSortDescending"=> trans('admin.Sort Descending')
                ]
        ];
    }
}

if(!function_exists('seting')){
    function setting(){
        return \App\Setting::orderBy('id','desc')->first();
    }
}


if(!function_exists('validate_image')){
    function validate_image($ext=null){
        if($ext === null){
            return 'image|mimes:jpg,jpeg,png,gif';
        }else{
            return 'image|mimes:'.$ext;
        }
    }
}
