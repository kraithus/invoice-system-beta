@component('mail::message')
# Invoice Sent
 
Hi {{ $customerName }}, here is your invoice for {{ $jobName }} at the price of MWK {{ $jobPrice}}
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent