@extends('layouts.welcom')
@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('dist/img/shop01.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Laptop<br>Collection</h3>
                        <a href="/shop" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('dist/img/shop03.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Accessories<br>Collection</h3>
                        <a href="/shop" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('dist/img/shop02.png')}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Cameras<br>Collection</h3>
                        <a href="/shop" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="hot-deal" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>Year</h3>
                                <p><script>document.write(new Date().getFullYear());</script></p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>Month</h3>
                                <p><script>document.write(new Date().getMonth() + 1);</script></p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>Day</h3>
                                <p><script>document.write(new Date().getDate());</script></p>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="/shop">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab1">Accessories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('dist/img/product01.png')}}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('dist/img/product02.png')}}" alt="">
                                        <div class="product-label">
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('dist/img/product03.png')}}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                        <div class="product-rating">
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('dist/img/product04.png')}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{asset('dist/img/product05.png')}}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                                @forelse ($product as $pro)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{url('images',$pro->image)}}" style="height: 262px" alt="{{$pro->name}}">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">{{$pro->name}}</a></h3>
                                            <h4 class="product-price">${{$pro->prix}} <del class="product-old-price">DH 990.00</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form action="{{ route('cart.store') }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                                <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                                <input type="hidden" value="{{ $pro->prix }}" id="price" name="price">
                                                <input type="hidden" value="{{ $pro->image }}" id="img" name="img">
                                                <input type="hidden" value="{{ $pro->description }}" id="slug" name="slug">
                                                <input type="hidden" value="1" id="quantity" name="quantity">
                                                <div class="card-footer" style="background-color: white;">
                                                      <div class="row">
                                                        <button class="add-to-cart-btn" title="add to cart">
                                                            <i class="fa fa-shopping-cart"></i> add to cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>        
                                @empty
                                    <p>No Data</p>
                                @endforelse
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection