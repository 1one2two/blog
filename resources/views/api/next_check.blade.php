@if ($paginator->hasPages())
    @if ($paginator->hasMorePages())
yes    
    @else
no
    @endif
@endif