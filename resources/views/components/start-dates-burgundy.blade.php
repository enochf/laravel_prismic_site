<?php

include('../resources/views/includes/global_data.blade.php');

$now = new DateTime();

foreach ($g_start_dates_burgundy as $d) {

    $date = new DateTime($d);

    if($date >= $now) {
        $next_date = '<div class="classStart">
        <h4>Classes Start '.date("M j\<\s\u\p\>S\<\/\s\u\p\>", strtotime($d)).'</h4>
            <a class="btnOrange" href="https://csuglobal.edu/request-information">Get Started Today →</a>
        </div>';
        break;
    }
}
return $next_date;