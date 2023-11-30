<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">
                            @if (session()->get('language') == 'en')
                                Contact Us
                            @else
                                Liên Hệ
                            @endif
                        </h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class="toggle-footer" style="">
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>Phú Đô, Nam Từ Liêm, Hà Nội</p>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body">
                                    <p>+0868761196<br>
                                </div>
                            </li>
                            <li class="media">
                                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                                <div class="media-body"> <span><a href="#">ngo.huy.van.2001@gmail.com</a></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">
                            @if (session()->get('language') == 'en')
                                Customer Service
                            @else
                                Dịch Vụ Khách Hàng
                            @endif
                        </h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="/user/dashboard" title="Contact us">
                                    @if (session()->get('language') == 'en')
                                        My Account
                                    @else
                                        Tài Khoản Của Tôi
                                    @endif
                                </a></li>
                            <li><a href="/user/order" title="About us">
                                    @if (session()->get('language') == 'en')
                                        Order History
                                    @else
                                        Lịch Sử Đơn Hàng
                                    @endif
                                </a></li>
                            <li><a href="#" title="faq">FAQ</a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">
                            @if (session()->get('language') == 'en')
                                Corporation
                            @else
                                Tập Đoàn
                            @endif
                        </h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a title="Your Account" href="#">

                                    @if (session()->get('language') == 'en')
                                        About us
                                    @else
                                        Về Chúng Tôi
                                    @endif
                                </a></li>
                            <li><a title="Information" href="#">
                                    @if (session()->get('language') == 'en')
                                        Customer Service
                                    @else
                                        Dịch Vụ Khách Hàng
                                    @endif
                                </a></li>
                            <li><a title="Addresses" href="#">

                                    @if (session()->get('language') == 'en')
                                        Company
                                    @else
                                        Công ty
                                    @endif
                                </a></li>
                            <li><a title="Addresses" href="#">
                                    @if (session()->get('language') == 'en')
                                        Investor Relations
                                    @else
                                        Quan Hệ Đầu Tư
                                    @endif
                                </a></li>
                            <li class="last"><a title="Orders History" href="#">
                                    @if (session()->get('language') == 'en')
                                        Advanced Search
                                    @else
                                        Tìm Kiếm Nâng Cao
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
                <!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">
                            @if (session()->get('language') == 'en')
                                Why Choose Us
                            @else
                                Tại Sao Chọn Chúng Tôi
                            @endif
                        </h4>
                    </div>
                    <!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="About us">
                                    @if (session()->get('language') == 'en')
                                        Shopping Guide
                                    @else
                                        Hướng Dẫn Mua Sắm
                                    @endif
                                </a></li>
                            <li><a href="#" title="Investor Relations">
                                    @if (session()->get('language') == 'en')
                                        Investor Relations
                                    @else
                                        Quan Hệ Đầu Tư
                                    @endif
                                </a></li>
                            <li class=" last"><a href="contact-us.html" title="Suppliers">
                                    @if (session()->get('language') == 'en')
                                        Contact Us
                                    @else
                                        Liên Hệ Chúng Tôi
                                    @endif
                                </a></li>
                        </ul>
                    </div>
                    <!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                    <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                    <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#"
                            title="GooglePlus"></a></li>
                    <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a>
                    </li>
                    <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#"
                            title="PInterest"></a></li>
                    <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#"
                            title="Linkedin"></a></li>
                    <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#"
                            title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="{{ asset('frontend/assets/images/payments/1.png') }}" alt=""></li>
                        <li><img src="{{ asset('frontend/assets/images/payments/2.png') }}" alt=""></li>
                        <li><img src="{{ asset('frontend/assets/images/payments/3.png') }}" alt=""></li>
                        <li><img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt=""></li>
                        <li><img src="{{ asset('frontend/assets/images/payments/5.png') }}" alt=""></li>
                    </ul>
                </div>
                <!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
