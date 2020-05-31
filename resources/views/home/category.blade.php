@extends('layouts.welcom')
@section('content')
<div id="breadcrumb" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="/">Home</a></li>
                    <li class="active">All Categories</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            
                @forelse ($category as $cat)
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="{{asset('dist/img/stor.ico')}}" alt="">
                            </div>
                            <div class="shop-body">
                                <?php $nbrs = DB::table('products')->where('category_id',$cat->id)->get(); ?>
                                <h3>{{$cat->name}}<br>{{count($nbrs)}} Product </h3>
                                <a href="{{url('Showcategory',$cat->id)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Data</p>
                @endforelse
            
        </div>
    </div>
</div>
@endsection