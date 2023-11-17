<div class="clearfix filters-container">
    <div class="text-right">
        <div class="pagination-container">
            @if ($paginator->hasPages())
                <ul class="list-inline list-unstyled">
                    @if ($paginator->onFirstPage())
                        <li class="prev">
                            <a href="javascript:void(0)">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                    @else
                        <li class="prev">
                            <a href="{{ $paginator->previousPageUrl() }}">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="next">
                                        <a href="javascript:void(0)">{{ $page }}</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach



                    @if ($paginator->hasMorePages())
                        <li class="next">
                            <a href="{{ $paginator->nextPageUrl() }}">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="next">
                            <a href="javascript:void(0)">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    @endif

                </ul>
            @endif
            <!-- /.list-inline -->
        </div>
        <!-- /.pagination-container -->
    </div>
    <!-- /.text-right -->

</div>
