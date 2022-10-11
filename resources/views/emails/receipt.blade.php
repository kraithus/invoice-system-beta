@component('mail::message')
# Receipt Sent
 
Hi {{ $customerName }}, here is your receipt for {{ $jobName }}, price MWK {{ $jobPrice}}
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent