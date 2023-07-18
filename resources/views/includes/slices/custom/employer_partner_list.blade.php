<?php
use Prismic\Api;
use Prismic\Predicates;

$api = Api::get(env('PRISMIC_API_ENDPOINT'));

function getPartners($num, $api) {
    $response = $api->query(
        Predicates::at('document.type', 'item_employer_partner'),
        [
            'pageSize' => 100, 'page' => $num,
            'orderings' => '[my.item_employer_partner.partner]'
        ]
    );

    foreach ($response->results as $partner) {
        echo '<a href="/cost/tuition-discounts/employer-partners/'.$partner->data->url.'">'.$partner->data->partner.'</a><br />';
    }

    if ($num+1 <= $response->total_pages) {
        getPartners($num+1, $api);
    }
}

?>

<!-- columns -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="">

            <?php

            getPartners(1, $api);

            // dd($response);

            ?>

            </div>
        </div>
    </div>
</div>