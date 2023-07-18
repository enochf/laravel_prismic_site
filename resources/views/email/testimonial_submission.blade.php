@component('mail::message')

The following individual has submitted a testimonial:

<strong>First Name:</strong><br /> {{ $email->first_name }}<br /><br />
<strong>Last Name:</strong><br /> {{ $email->last_name }}<br /><br />
<strong>CSU Global Email:</strong><br /> {{ $email->email_csug }}<br /><br />
<strong>Personal Email:</strong><br /> {{ $email->email_personal }}<br /><br />
<strong>City:</strong><br /> {{ $email->city }}<br /><br />
<strong>State:</strong><br /> {{ $email->state }}<br /><br />
<strong>Relationship with CSU Global:</strong><br /> {{ $email->relationship }}<br /><br />
<strong>Are you the first in your family to attend college?</strong><br /> {{ isset($email->student) ? 'Yes' : 'No' }}<br /><br />
<strong>Department or Program Area:</strong><br /> {{ isset($email->department) ? $email->department: '' }}<br /><br />
<strong>What is your military affiliation?</strong><br /> {{ $email->military }}<br /><br />
<strong>Degree Program:</strong><br /> {{ isset($email->program) ? $email->program : '' }}<br /><br />
<strong>What do you love about CSU Global?</strong><br /> {{ isset($email->csug_love) ? $email->csug_love : '' }}<br /><br />
<strong>Graduation Year or Anticipated Graduation Year:</strong><br /> {{ isset($email->grad_year) ? $email->grad_year : '' }}<br /><br />
<strong>How did your education from CSU Global positively impact your life or career?</strong><br /> {{ isset($email->csug_experience) ? $email->csug_experience : '' }}<br /><br />
<strong>Why did you choose CSU Global? What were your goals when you started?</strong><br /> {{ isset($email->why_csug) ? $email->why_csug : '' }}<br /><br />
<strong>What specific challenges did you have to overcome to earn your degree or certificate? How did you do it and do you have any advice for others?</strong><br /> {{ isset($email->challenges) ? $email->challenges : '' }}<br /><br />

Thanks,<br>
{{ config('app.name') }}
@endcomponent