@if ($paginator->hasPages())
<ul class="pagination" style="background-color: #fff; border: 1px solid rgb(212, 212, 212); box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px;">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li aria-disabled="true" aria-label="« Previous" class="page-item disabled">
        <span aria-hidden="true" class="page-link" style="color: #3490dc;">«</span>
    </li>

    <li aria-disabled="true" aria-label="« Previous" class="page-item disabled">
        <span aria-hidden="true" class="page-link" style="color: #3490dc;">‹</span>
    </li>
    @else
    <li class="page-item">
        <a class="page-link" href="?page=1" style="color: #3490dc;">«</a>
    </li>
    
    <li class="page-item">
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="« Previous" class="page-link" style="color: #3490dc;">‹</a>
    </li>
    @endif

    <li aria-current="page" class="page-item">
        <span class="page-link" href="#">{{ $paginator->currentPage() }}</span>
    </li>

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="page-item">
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next »" class="page-link" style="color: #3490dc;">›</a>
    </li>
    
    <li class="page-item">
        <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" style="color: #3490dc;">»</a>
    </li>
    @else
    <li aria-disabled="true" aria-label="Next »" class="page-item disabled">
        <span aria-hidden="true" class="page-link" style="color: #3490dc;">›</span>
    </li>

    <li aria-disabled="true" aria-label="Next »" class="page-item disabled">
        <span aria-hidden="true" class="page-link" style="color: #3490dc;">»</span>
    </li>
    @endif
</ul>
@endif