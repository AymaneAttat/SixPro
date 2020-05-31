<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>This is my first project in laravel E-commerce and the project N°6 in my projects, the best are coming.</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>1234 Kings Road</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+021-34-56-78</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>notworking@notworking.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <?php $cats = DB::table('categories')->where('status',1)->get(); ?>
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            @forelse ($cats as $cat)
                                <li><a href="#">{{ucwords($cat->name)}}</a></li>
                            @empty
                                <li><a href="#">No Data</a></li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="/login/customer">My Account</a></li>
                            <li><a href="{{route('cart.index')}}">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 2020 Laravel 7<i class="fa fa-heart-o" aria-hidden="true"></i>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
                <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>