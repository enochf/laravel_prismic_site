<?php

include('../resources/views/includes/global_data.blade.php');

$now = new DateTime();
$month = 0;

foreach ($g_start_dates as $d) {

    $date = new DateTime($d);

    if($date >= $now) {
        echo '<option value="'.$d.'" class="standard">'.$d.'</option>
        ';
        $month++;
        if ($month == 4) {
            break;
        }
    }
}