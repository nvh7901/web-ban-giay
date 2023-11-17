<div class="row">
    <div class="col-sm-12">
        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
            @if ($paginator->hasPages())
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="paginate_button page-item previous disabled" id="example1_previous">
                            <a href="javascript:void(0)" aria-controls="example1" data-dt-idx="0" tabindex="0"
                                class="page-link">
                                Previous
                            </a>
                        </li>
                    @else
                        <li class="paginate_button page-item previous" id="example1_previous">
                            <a href="{{ $paginator->previousPageUrl() }}" aria-controls="example1" data-dt-idx="0"
                                tabindex="0" class="page-link">
                                Previous
                            </a>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="paginate_button page-item active">
                                        <a href="javascript:void(0)" aria-controls="example1" data-dt-idx="1"
                                            tabindex="0" class="page-link">
                                            {{ $page }}
                                        </a>
                                    </li>
                                    {{-- <a class="is-active" href="">
                                        <li>{{ $page }}</li>
                                    </a> --}}
                                @else
                                    {{-- <a href="{{ $url }}">
                                        <li>{{ $page }}</li>
                                    </a> --}}
                                    <li class="paginate_button page-item">
                                        <a href="{{ $url }}" aria-controls="example1" data-dt-idx="1"
                                            tabindex="0" class="page-link">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li class="paginate_button page-item next" id="example1_next">
                            <a href="{{ $paginator->nextPageUrl() }}" aria-controls="example1" data-dt-idx="7"
                                tabindex="0" class="page-link">Next
                            </a>
                        </li>
                    @else
                        <li class="paginate_button page-item next" id="example1_next">
                            <a href="javascript:void(0)" aria-controls="example1" data-dt-idx="7" tabindex="0"
                                class="page-link">Next
                            </a>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</div>
