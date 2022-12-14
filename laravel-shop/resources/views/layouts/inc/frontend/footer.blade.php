<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{ url('/about-us') }}" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="{{ url('/conatct-us') }}" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="{{ url('/blogs') }}" class="text-white">Blogs</a></div>
                    {{-- <div class="mb-2"><a href="" class="text-white">Sitemaps</a></div> --}}
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="{{ url('new-arrivals') }}" class="text-white">New Arrivals Products</a></div>
                    {{-- <div class="mb-2"><a href="" class="text-white">Featured Products</a></div> --}}
                    <div class="mb-2"><a href="{{ url('/cart') }}" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Online Payment</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <img src="{{ asset('assets/online_payment/paypal.png') }}" style="width: 52px; height: 22px;" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{ $appSetting->address }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $appSetting->phone1 }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{ $appSetting->email1 }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2022 - Laravel Shopping - Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        <a href="{{ $appSetting->facebook }}"><i class="fa fa-facebook"></i></a>
                        <a href="{{ $appSetting->twitter }}"><i class="fa fa-twitter"></i></a>
                        <a href="{{ $appSetting->instagram }}"><i class="fa fa-instagram"></i></a>
                        <a href="{{ $appSetting->youtube }}"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>