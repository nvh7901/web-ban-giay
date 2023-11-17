<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head">
        <i class="icon fa fa-align-justify fa-fw"></i>

        @if (session()->get('language') == 'en')
            Categories
        @else
            Loại sản phẩm
        @endif
    </div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach ($categories as $category)
                <li class="dropdown menu-item">
                    <a href="/product/category/{{ $category->id }}/{{ $category->category_slug_en }}" data-hover="dropdown"
                        class="dropdown-toggle">
                        <i class="icon fa fa-diamond" aria-hidden="true"></i>
                        @if (session()->get('language') == 'en')
                            {{ $category->category_name_en }}
                        @else
                            {{ $category->category_name_vi }}
                        @endif
                    </a>

                    @php
                        $subCategories = App\Models\SubCategory::where('category_id', $category->id)
                            ->orderBy('id', 'ASC')
                            ->get();
                    @endphp
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @foreach ($subCategories as $sub_category)
                                    <div class="col-sm-12 col-md-3">
                                        <ul class="links list-unstyled">
                                            <li>
                                                <a href="{{ url('product/sub-category/' . $sub_category->id . '/' . $sub_category->sub_category_slug_en) }}">
                                                    @if (session()->get('language') == 'en')
                                                        {{ $sub_category->sub_category_name_en }}
                                                    @else
                                                        {{ $sub_category->sub_category_name_vi }}
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
            @endforeach
            <!-- /.menu-item -->
        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
