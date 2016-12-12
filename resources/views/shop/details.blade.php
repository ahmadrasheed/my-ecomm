@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
@include('partials.carousel')
   <!--recommending products for the logged in user--------------------------------------------->
   
<p><ul><h4 style="color:Orange;"><b>Recommended for you</b></h4></ul></p>
        
        <div class="row">
           
               
             
                <div class="col-sm-6 col-md-4 col-lg-12">
                    <div class="thumbnail">
                        <img src="{{URL::to($productD->imagePath)}}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $productD->title }}</h3>
                            <p class="description">{{ $productD->description }}</p>
                            <div class="clearfix">
                                <div class="pull-left price">${{ $productD->price }}</div>
                                <a href="{{ route('product.addToCart', ['id' => $productD->id]) }}"
                                   class="btn btn-success pull-right" role="button">Add to Cart</a>
                                   &nbsp;&nbsp;&nbsp;
                                   <a href="{{ route('product.details', ['id' => $productD->id]) }}"
                                   class="btn btn-warning pull-right" role="button">details</a>
                            </div>
                        </div>
                    </div>
                        
                </div>
             
        </div>
    

    
    
<hr>
<hr>    
<p ><ul><h3 style="color:Orange;">products from DB</h3></ul></p>   
    
    

@endsection