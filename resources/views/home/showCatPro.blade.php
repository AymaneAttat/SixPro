@extends('layouts.welcom')
@section('content')
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="/">Home</a></li>
                    <li><a href="/categories">All Categories</a></li>
                    <li class="active">Show Category: {{$category->name}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div id="aside" class="col-md-3">
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
            <div id="store" class="col-md-9">
                @forelse ($product as $pro)
                    <div class="col-md-4 col-xs-6">
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
            </div>
        </div>
    </div>
</div>
@endsection