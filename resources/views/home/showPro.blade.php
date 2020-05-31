@extends('layouts.welcom')
@section('content')
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="/">Home</a></li>
                    <li><a href="/categories">All Categories / </li>
                    <li><a> Show Category / </a></li>
                    <li class="active"> Produits {{$pro->name}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div id="aside" class="col-md-2">
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">
                        <?php $cats = DB::table('categories')->where('status',1)->get(); ?>  
                        @forelse ($cats as $cat)
                            <?php $nbrs = DB::table('products')->where('category_id',$cat->id)->get(); ?>
                            <div class="input-checkbox">
                                <a href="{{url('Showcategory',$cat->id)}}">{{ucwords($cat->name)}}</a>( {{count($nbrs)}} )
                            </div>
                        @empty
                            <p>No Data</p>
                        @endforelse
                    </div>
                </div>
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        <?php $manufact = DB::table('manufactures')->where('status',1)->get(); ?>    
                        @forelse ($manufact as $manu)
                            <div class="input-checkbox">
                                <a href="#">{{ucwords($manu->name)}}</a>
                            </div>
                        @empty
                            <p>No Data</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="thumbnail">
                        <img src="{{url('images',$pro->image)}}" class="card-img" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-details">
                        <h2 class="product-name">{{$pro->name}}</h2>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">10 Review(s) | Add your review</a>
                        </div>
                        <div>
                            <h3 class="product-price">Dh{{$pro->prix}} <del class="product-old-price">$990.00</del></h3>
                            <span class="product-available">In Stock</span>
                        </div>
                        <p><h4>{!!$pro->DetailDescription!!}.</h4></p>

                        <div class="product-options">
                            <label>Size: 
                                {{$pro->size}}
                            </label>
                            <label>
                                Color: {{$pro->color}}
                            </label>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>

                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Category:</li>
                            <li><a href="#">Headphones</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>
                </div>
            </div>
            <!-- product -->
                @forelse ($product as $pro)
                    <div class="col-md-3 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="{{url('images',$pro->image)}}" style="height: 260px" alt="Product name">
                                <div class="product-label">
                                    <span class="sale">-30%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">{{$pro->name}}</a></h3>
                                <h4 class="product-price">Dh {{$pro->prix}} <del class="product-old-price">$990.00</del></h4>
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
                                    <button class="quick-view"><a href="{{url('ShowPro',$pro->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>
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
                    </div>
                @empty
                    <p>No Data</p>
                @endforelse
            <!-- /product -->
            <div class="clearfix visible-sm visible-xs"></div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection