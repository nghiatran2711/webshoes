@extends('layout')
@push('slide')
    <script src="{{asset('public/front_end/js/slide.js')}}"></script>
@endpush
@section('content')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="slider" id="main-slider"><!-- outermost container element -->
				<div class="slider-wrapper"><!-- innermost wrapper element -->
					<img src="{{ asset('public/front_end/images/slide/slide1.jpg') }}" alt="First" class="slide" /><!-- slides -->
					<img src="{{ asset('public/front_end/images/slide/slide2.jpg') }}" alt="Second" class="slide" />
					<img src="{{ asset('public/front_end/images/slide/slide3.jpg') }}" alt="Third" class="slide" />
				</div>
			</div>
        </div>
    </div>
</section><!--/slider-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($category as $key => $value): ?>
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{URL::to('/product-by-category/'.$value->categoryID)}}">{{$value->categoryName}}</a></h4>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div><!--/category-products-->
                
                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php foreach ($brand as $key => $value): ?>
                                    <li><a href="{{URL::to('/product-by-brand/'.$value->brandID)}}">{{$value->brandName}}</a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                    
                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->
                    
                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('public/front_end/images/home/shipping.jpg')}}" alt="" />
                    </div><!--/shipping-->
                
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <?php foreach ($product as $key => $value): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <a href="{{URL::to('/product-details/'.$value->productID)}}">
                                        <div class="productinfo text-center">
                                            <img src="public/uploads/product/{{$value->image}}" alt="" />
                                            <h2>{{number_format($value->price)}} VNĐ</h2>
                                            <p>{{$value->productName}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </a>        
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection