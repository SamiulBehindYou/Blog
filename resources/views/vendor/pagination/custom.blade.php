@if ($paginator->hasPages())
<div class="pagination">
    <div class="pagination-area">
        <div class="pagination-list">
            <ul class="list-inline">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li><a href="#"><i class="las la-arrow-left"></i></a></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}"><i class="las la-arrow-left"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><a>{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="active">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="las la-arrow-right"></i></a></li>
            @else
                <li><a href="#"><i class="las la-arrow-right"></i></a></li>
            @endif
            </ul>
        </div>
    </div>
</div>

@endif



<!--pagination-->
{{-- <div class="pagination">
    <div class="pagination-area">
        <div class="pagination-list">
            <ul class="list-inline">
                <li><a href="#"><i class="las la-arrow-left"></i></a></li>
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#"><i class="las la-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
</div> --}}
