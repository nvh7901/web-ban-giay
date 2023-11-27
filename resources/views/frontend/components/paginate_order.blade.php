<nav aria-label="Page navigation example">
    @if ($paginator->hasPages())
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">Previous</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">Next</a>
                </li>
            @endif
        </ul>
    @endif
</nav>
