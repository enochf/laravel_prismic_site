<?php use Prismic\Dom\RichText; ?>
<!-- subheader -->
<div id="subheadercontainer" style="background-image:url({{ $prismic->data->image->url }})">
	<div id="subhead" class="container">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">
        			<h1>{{ $prismic->data->title_sm }}<span class="program">{{ $prismic->data->title }}</span></h1>
        		</div>
        		<div class="col-md-4 col-sm-6 col-xs-12">
                    @include('includes.rfi_short')
        		</div>
        	</div>
        </div>
    </div>
</div>