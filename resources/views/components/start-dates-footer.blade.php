<?php

include('../resources/views/includes/global_data.blade.php');

$now = new DateTime();

foreach ($g_start_dates as $d) {

    $date = new DateTime($d);

    if($date >= $now) {
        echo '<span id="footer-announcements-date">'.date("F j\<\s\u\p\>S\<\/\s\u\p\>", strtotime($d)).'</span>';
        break;
    }
}