@component('mail::message')

{{trans('user.Message Are Sent') . ' ' . config('app.name')}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
