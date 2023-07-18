<?php
// dd($slice);
// exit;
$children = $slice->children->results;
if (!isset($query['p'])) {
    $query['p'] = 1;
}
?>
<!-- articles-list -->
<div class="ccm-custom-style-container ccm-custom-style-maincontent-4344 padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

            @for ($i = 0; $i < count($children); $i++)

                <div class="article-list">

                @if (isset($children[$i]->data->thumbnail->url))
                    <div class="al-thumbnail">
                        <img src="{{ $children[$i]->data->thumbnail->url }}" alt="{{ $children[$i]->data->thumbnail->alt }}" width="{{ $children[$i]->data->thumbnail->dimensions->width }}" height="{{ $children[$i]->data->thumbnail->dimensions->height }}" class="img-responsive">
                    </div>
                @endif

                    <div class="al-text">
                        <div class="al-title">
                            <a href="{{ $children[$i]->data->path }}" target="_self">{{ $children[$i]->data->title }}</a>
                        </div>
                        <div class="al-date">{{ date('F j, Y', strtotime($children[$i]->data->article_publish_date)) }}</div>
                        <div class="al-description">{{ $children[$i]->data->{'meta-description'} }}</div>
                    </div>
                </div>

            @endfor

                <div class="ccm-pagination-wrapper">
                    <p>&nbsp;</p>
                    <ul class="pagination">

                    @if ($slice->children->prev_page == null)
                        <li class="prev disabled"><span>← Previous</span></li>
                    @else
                        <li class="prev"><a href="/about/news/whats-new-u?p={{ $query['p'] - 1 }}" rel="prev"><span>← Previous</span></a></li>
                    @endif

                    @if ($query['p'] <= 5)
                        @for ($i = 1; $i <= 7; $i++)
                            @if ($i == $query['p'])
                                <li class="active"><span>{{ $i }} <span class="sr-only">(current)</span></span></li>
                            @else
                                <li><a href="/about/news/whats-new-u?p={{ $i }}">{{ $i }}</a></li>
                            @endif
                        @endfor
                        <li class="disabled"><span>…</span></li>
                    @else
                        <li><a href="/about/news/whats-new-u">1</a></li>
                        <li class="disabled"><span>…</span></li>
                        @for ($i = ($query['p'] - 3); $i <= ($query['p'] + 3); $i++)
                            @if ($i <= $slice->children->total_pages)
                                @if ($i == $query['p'])
                                    <li class="active"><span>{{ $i }} <span class="sr-only">(current)</span></span></li>
                                @else
                                    <li><a href="/about/news/whats-new-u?p={{ $i }}">{{ $i }}</a></li>
                                @endif
                            @endif
                        @endfor
                        @if ($query['p'] < $slice->children->total_pages - 3)
                            <li class="disabled"><span>…</span></li>
                        @endif
                    @endif

                    @if ($slice->children->next_page == null)
                        <li class="next disabled"><span>Next →</span></li>
                    @else
                        <li class="next"><a href="/about/news/whats-new-u?p={{ $query['p'] + 1 }}" rel="next"><span>Next →</span></a></li>
                    @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>