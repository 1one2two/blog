@if ($paginator->hasPages())
<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li aria-disabled="true" aria-label="« Previous" class="page-item disabled">
        <span aria-hidden="true" class="page-link">‹</span>
    </li>
    @else
    <li class="page-item">
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="« Previous" class="page-link">‹</a>
    </li>
    @endif

    <li aria-current="page" class="page-item">
        <span class="page-link" href="#">{{ $paginator->currentPage() }}</span>
    </li>

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="page-item">
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next »" class="page-link">›</a>
    </li>
    @else
    <li aria-disabled="true" aria-label="Next »" class="page-item disabled">
        <span aria-hidden="true" class="page-link">›</span>
    </li>
    @endif
</ul>
@endif