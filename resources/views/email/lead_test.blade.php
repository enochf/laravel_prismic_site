@component('mail::message')

Initial @test.com check

{{ print_r($email) }}

On Page:<br />
{{ config('app.url') }}{{ $email->url }}

Sincerely,

CSU-Global Marketing<br />
{{ config('app.name') }}
@endcomponent