@component('mail::message')
# {{ $subject }}
 
Your controller sent a message saying: 
"{{ $message }}"
 
@component('mail::button', ['url' => 'notification'])
View Notifcation on Website
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent