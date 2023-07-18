@component('mail::message')

Enrollment,

The following individual completed payment for an international transcript evaluation:

<strong>Name:</strong><br /> {{ $email->first_name }} {{ $email->last_name }}<br /><br />
<strong>Email:</strong><br /> {{ $email->email }}<br /><br />
<strong>Phone:</strong><br /> {{ $email->phone }}<br /><br />
<strong>Record:</strong><br /> https://csuglobal.my.salesforce.com/{{ $email->Id }}<br /><br />

<strong>Institution #1:</strong><br /> {{ $email->institution1 }}<br /><br />
<strong>Address #1:</strong><br /> {{ $email->inst1_address }}<br /><br />

<strong>Institution #2:</strong><br /> {{ $email->institution2 }}<br /><br />
<strong>Address #2:</strong><br /> {{ $email->inst2_address }}<br /><br />

<strong>Institution #3:</strong><br /> {{ $email->institution3 }}<br /><br />
<strong>Address #3:</strong><br /> {{ $email->inst3_address }}<br /><br />

CSU Global Marketing<br>
{{ config('app.name') }}
@endcomponent