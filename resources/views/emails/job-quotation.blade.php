@component('mail::message')
# Quotation Sent
 
Hi {{ $customerName }}, here is your quotation for {{ $jobName }} at the agreed price of MWK {{ $jobPrice}}
 
@component('mail::button', ['url' => 'xyz.com'])
View Quotation
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent