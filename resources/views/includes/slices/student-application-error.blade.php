<!-- student-application-error -->
<div class="contiainer style-container centered intro">
    <div class="row">
        <div class="col-md-12">
            <h2>Oops! Looks like something went wrong.</h2>
            <p class="intro">Looks like there was an error processing your application. Please reach out to your enrollment counselor or call <strong>(800) 462-7845</strong> and we'd be happy to assist you. We apologize for the inconvenience.</p>

            @if (isset($query['code']))

                <p style="font-size:24px;"><strong>Error Code: {{ $query['code'] }}</strong></p>

            @endif

        </div>
    </div>
</div>