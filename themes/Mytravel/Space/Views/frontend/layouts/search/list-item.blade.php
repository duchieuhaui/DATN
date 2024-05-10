<div class="row">
    <div class="col-lg-4 col-xl-3 col-md-12">
        @include('Space::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-8 col-xl-9 col-md-12">
        <div class="bravo-list-item">
            <div class="d-flex justify-content-between align-items-center mb-4 topbar-search">
                <h3 class="font-size-21 font-weight-bold mb-0 text-lh-1 result-count">
                    @if($rows->total() > 1)
                        {{ __(":count spaces found",['count'=>$rows->total()]) }}
                    @else
                        {{ __(":count space found",['count'=>$rows->total()]) }}
                    @endif
                </h3>
                <div class="control">
                    @include('Space::frontend.layouts.search.orderby')
                </div>
            </div>
            <div class="ajax-search-result">
                @include('Space::frontend.ajax.search-result')
            </div>
        </div>
    </div>
</div>
