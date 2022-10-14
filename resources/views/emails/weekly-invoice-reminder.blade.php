@component('mail::message')
# Invoice Reminder Sent
 
Hi, kindly be reminded that you have an outstanding invoice which is
7 days overdue.
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent