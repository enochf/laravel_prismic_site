@component('mail::message')

Enrollment,

The individual below attempted to contact CSU-Global using the RFI form on the following page:<br />
{{ config('app.url') }}{{ $email->url }}

<strong>Name:</strong> {{ $email->FirstName }} {{ $email->LastName }}

<strong>Email:</strong> {{ $email->Email }}

<strong>Phone:</strong> {{ $email->Phone }}

<strong>Record:</strong> https://csuglobal.my.salesforce.com/{{ $email->Id }}

<strong>The record was matched on the following lead term:</strong><br />
{{ $email->term }}

Sincerely,

CSU-Global Marketing<br />
{{ config('app.name') }}
@endcomponent