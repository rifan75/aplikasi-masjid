@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span style="color:black;margin-right=3px">{{ __('Prev') }}</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="color:black;margin-right=3px">{{ __('Prev') }}</a></li>
        @endif
        
        &nbsp;
        
        {{ "Hal " . $paginator->currentPage() . "  of  " . $paginator->lastPage() }}
        &nbsp;
        
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" style="color:black;margin-left=3px">{{ __('Next') }}</a></li>
        @else
            <li class="disabled"><span style="color:black;margin-left=3px">{{ __('Next') }}</span></li>
        @endif
    </ul>
@endif