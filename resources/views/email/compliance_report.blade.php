@component('mail::message')

The following compliance complaint has been sent through CSUGlobal.edu:

<strong>Name:</strong><br /> {{ $email->name }}<br /><br />
<strong>Email:</strong><br /> {{ $email->email }}<br /><br />
<strong>Complaint:</strong><br /> {{ $email->complaint }}<br /><br />

Thanks,<br>
{{ config('app.name') }}
@endcomponent