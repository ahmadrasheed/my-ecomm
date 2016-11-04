@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
@include('partials.carousel')
<!----------------------------------------search form ---------------------------------------- --> 
<div class="row">
   <div class="col-lg-4 col-lg-offset-4">
       <form class="form-inline" method="get" action="{{route('products.search_index')}}">
                            <div class="form-group">
                                <input type="text" class="form-control " name="search"  id="search" >
                                <button type="submit" name="add" class="btn btn-success form-control">Search for a Product </button>
                                {{-- <a href="#" class="btn btn-info fa fa-trash" role="button"></a>--}}
                            </div>

                            {{csrf_field()}}
                        </form>
    
  </div><!-- /.col-lg-6 -->
</div>
  
   <br>
    <!-- checking some messages -->
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
    
    <div class="ahmad"><p></p></div>
    
       @if(Session::has('search_results'))
        <div class="row">
                <div class="col-sm-12">
                   <div class="alert {{Session::get('alert_type')}} fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> {{ Session::get('search_results') }}
                                 {{ Session::flush()}}
                        </strong> 

                  </div> 
             </div>
         </div>
       
    @endif
    

   
    <!--recommending products for the logged in user--------------------------------------------->
@if(!empty($recommended_items))    
<p><ul><h4 style="color:Orange;"><b>Recommended for you</b></h4></ul></p>
        
        <div class="row">
            @foreach($recommended_items as $item)
               
               @foreach($item as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">{{ $product->description }}</p>
                            <div class="clearfix">
                                <div class="pull-left price">${{ $product->price }}</div>
                                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
                                   class="btn btn-success pull-right" role="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                        
                </div>
                @endforeach
            @endforeach
        </div>
    
  @endif
    
    
<hr>
<hr>    
<p ><ul><h3 style="color:Orange;">products from DB</h3></ul></p>   
    
    
    
    
    
    
    
    
<!--  ------------ displaying products from the databse  without recommending------------------->
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="thumbnail">
                        <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">{{ $product->description }}</p>
                            <div class="clearfix">
                                <div class="pull-left price">${{ $product->price }}</div>
                                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
                                   class="btn btn-success pull-right" role="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach


   @if(count($products)>0)

        <div class="row clearfix">
            <div class="col-sm-6 col-md-6 col-md-offset-4">
                {{ $products->links() }}
            </div>
        </div>
    @endif
@endsection