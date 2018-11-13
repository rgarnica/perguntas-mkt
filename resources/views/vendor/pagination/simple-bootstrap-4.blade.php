@if ($paginator->hasPages())
<div class="column is-2 is-offset-5 has-text-centered">
    <nav class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous button is-dark is-outlined" disabled>
                @lang('pagination.previous')
            </a>
        @else
            <a class="pagination-previous button is-dark is-outlined" href="{{ $paginator->previousPageUrl() }}">
                @lang('pagination.previous')
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination-next button is-dark is-outlined" href="{{ $paginator->nextPageUrl() }}">
                @lang('pagination.next')
            </a>
        @else
            <a class="pagination-next disabled button is-dark is-outlined" disabled>
                @lang('pagination.next')
            </a>
        @endif
    </nav>
</section>
@endif
