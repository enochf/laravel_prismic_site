@component('mail::message')

The following college has asked to be considered as a community college affiliate with CSU Global:

<strong>School Name:</strong><br /> {{ $email->school_name }}<br /><br />
<strong>School Address:</strong><br /> {{ $email->school_address }}<br /><br />
<strong>Contact Name:</strong><br /> {{ $email->contact_name }}<br /><br />
<strong>Contact Title:</strong><br /> {{ $email->contact_title }}<br /><br />
<strong>Contact Email:</strong><br /> {{ $email->contact_email }}<br /><br />
<strong>Contact Phone:</strong><br /> {{ $email->contact_phone }}<br /><br />

Thanks,<br>
{{ config('app.name') }}
@endcomponent