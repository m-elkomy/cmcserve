@component('mail::message')
{{trans('admin.Welcome') . ' ' . $data['data']->name}}

{{trans('admin.This is The Reset Password Page By') . ' ' . config('app.name')}}

@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])
{{trans('admin.Click Here To Reset The Password')}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
