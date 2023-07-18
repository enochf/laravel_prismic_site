<?php

include('../resources/views/includes/global_data.blade.php');

$now = new DateTime();

$next_dates = '<p class="large"><span style="font-size:24px">Enrollment Info Session:</span><br>
Register today to get answers to all of your enrollment questions.</p>
<p>
';

foreach ($g_info_sessions as $k => $v) {

    $date = new DateTime($k);

    if($date >= $now) {
        break;
    }

    $save_dates = '<a class="btnOrange" href="'.$v[0][3].'" target="_blank">'.$v[0][2].', '.$v[0][0].' at '.$v[0][1].' MT</a>&nbsp;&nbsp;
    <a class="btnOrange" href="'.$v[1][3].'" target="_blank">'.$v[1][2].', '.$v[1][0].' at '.$v[1][1].' MT</a>&nbsp;&nbsp;
    <a class="btnOrange" href="'.$v[2][3].'" target="_blank">'.$v[2][2].', '.$v[2][0].' at '.$v[2][1].' MT</a>&nbsp;&nbsp;
    ';

}

$next_dates.= $save_dates.'</p>
';

return $next_dates;