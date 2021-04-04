@component('mail::message')
    Hello {{$data['data']->name}}

    @foreach($data['permits'] as $update)
        There Is An Update In {{$update->permits_name_en}}
        @endforeach

    @foreach($data['regulations'] as $update)
        There Is An Update In {{$update->regulation_name_en}}
        @endforeach


    @foreach($data['question'] as $update)
        There Is An Update In {{$update->question_en}}
        @endforeach
Thanks,<br>
{{ config('app.name') }}
@endcomponent
