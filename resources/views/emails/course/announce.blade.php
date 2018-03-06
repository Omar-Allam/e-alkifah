@component('mail::message')
# الإعلان عن دورة جديدة

{{$request['course_name']}}

{!! $request['description'] !!}

@component('mail::button', ['url' => url('/')])
    الذهاب إلى الموقع
@endcomponent

Thanks,<br>
{{--![Logo]({{asset('/images/kifahlogo.png')}})--}}
@endcomponent
