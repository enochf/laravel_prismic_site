@component('mail::message')

The following individual has signed up to be an outreach advocate with CSU Global:

<strong>First Name:</strong><br /> {{ $email->first_name }}<br /><br />
<strong>Last Name:</strong><br /> {{ $email->last_name }}<br /><br />
<strong>Email:</strong><br /> {{ $email->email }}<br /><br />

<strong>I'm a:</strong><br />
{{ isset($email->student) ? '  * Student' : '' }}
{{ isset($email->staff) ? '  * Staff' : '' }}
{{ isset($email->alumni) ? '  * Alumni' : '' }}
{{ isset($email->faculty) ? '  * Faculty' : '' }}
<br /><br />

<strong>Program:</strong><br /> {{ $email->program }}<br /><br />
<strong>City:</strong><br /> {{ $email->city }}<br /><br />
<strong>State:</strong><br /> {{ $email->state }}<br /><br />

<strong>Method of Sharing:</strong><br />
{{ isset($email->video) ? '  * Video Testimonial' : '' }}
{{ isset($email->written) ? '  * Written Testimonial' : '' }}
{{ isset($email->blog) ? '  * BLog Article' : '' }}
{{ isset($email->speak) ? '  * Speak about CSU Global' : '' }}
{{ isset($email->social) ? '  * Social Posts' : '' }}
<br /><br />

<strong>Community Connections:</strong><br /> {{ $email->connections }}<br /><br />

Thanks,<br>
{{ config('app.name') }}
@endcomponent