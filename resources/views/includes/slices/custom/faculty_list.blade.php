<?php
use Illuminate\Support\Facades\Http;

$response = Http::withHeaders([
    'accept' => 'application/json'
  ])
  ->get('https://faculty.csuglobal.edu/api/v1/credentials')
  ->body();

$faculty = json_decode($response);

$letter = '';

echo '<div class="container flex-row faculty">
    <div class="row">
        <div class="col-md-12">
        ';

foreach($faculty as $k => $v) {
    if ($v->LastName[0] != $letter) {
        echo '<div class="letter">'.$v->LastName[0].'</div>
        ';
        $letter = $v->LastName[0];
    }
    echo '<dt>'.$v->FirstName.' '.$v->LastName.'</dt>
    <dd>
        <h3>Degrees:</h3>
        ';
        foreach ($v->Credentials as $degree) {
            echo '<p>'.$degree->School.' - '.$degree->FieldOfStudy.'</p>
            ';
        }
    echo '</dd>
    ';
}

echo '</div>
</div>
</div>
';