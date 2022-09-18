@component('mail::message')
# {{ $subject }}
 
Your controller sent a message saying: 
"{{ $message }}"
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent