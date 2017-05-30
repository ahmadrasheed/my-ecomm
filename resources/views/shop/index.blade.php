@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('geolocation')



    <!--    ==========================important for Ajax call    ======================    -->
  <meta name="csrf-token" content="<?php echo csrf_token() ?>" />

 <!--  to put the path of the route that will serve the ajax call -->
    <script>
        var url="{{route('createAjax')}}";


    </script>

@endsection
@section('content')
@include('partials.carousel')
<!----------------------------------------search form ---------------------------------------- -->


<!--battery API implementaion-->



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

<!------------------to view products according to geolocation of the user using Ajax call-->

  <div class="row" id="geolocation">

    <div id="gif" class="col-xs-6 col-xs-offset-5">

        <img class="text-center" id="gif" src="ajax-loader.gif" alt="ajax-loader">

    </div>


  </div>



   <!--recommending products for the logged in user--------------------------------------------->
 @if(!empty($recommended_items)))
<p><ul><h4 style="color:Orange;"><b>Recommended for you</b></h4></ul></p>

        <div class="row equal">
            @foreach($recommended_items as $item)

               @foreach($item as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">{!!html_entity_decode(str_limit($product->description, $limit = 100, $end = '...   ')) !!}</p>



                        <hr>
                               <div class="clearfix">
                                   <div class="row">
                                       <div class="col-xs-12 col-sm-4 ">
                                          <div class="pull-left price">${{ $product->price }}</div>

                                       </div>
                                        <div class="col-xs-12 col-sm-4 ">
                                           <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
                                       class="btn btn-success pull-right" role="button">Add to Cart</a>

                                       </div>

                                        <div class=" col-xs-12 col-sm-4 ">
                                           <a href="{{ route('product.details', ['id' => $product->id]) }}"
                                       class="btn btn-warning pull-right" role="button">details</a>

                                       </div>

                                   </div>


                            </div>



                        </div>


                    </div>

                </div>
                @endforeach
            @endforeach
        </div>

  @endif


<hr>

    <!--recommending products for the logged in user from by country --------------------------------------------->
 @if(!empty($recommended_items2))

<p><ul><h4 style="color:Orange;"><b>Recommended for you from your country</b></h4></ul></p>

        <div class="row equal">
            @foreach($recommended_items2 as $item)

               @foreach($item as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">{!!html_entity_decode(str_limit($product->description, $limit = 100, $end = '...   ')) !!}</p>
                                 <div class="clearfix">
                               <div class="row">
                                   <div class="col-xs-12 col-sm-4 ">
                                      <div class="pull-left price">${{ $product->price }}</div>

                                   </div>
                                    <div class="col-xs-12 col-sm-4 ">
                                       <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
                                   class="btn btn-success pull-right" role="button">Add to Cart</a>

                                   </div>

                                    <div class=" col-xs-12 col-sm-4 ">
                                       <a href="{{ route('product.details', ['id' => $product->id]) }}"
                                   class="btn btn-warning pull-right" role="button">details</a>

                                   </div>

                               </div>


                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            @endforeach
        </div>

  @endif


<hr>







<!-- ------------------------------adding data from the most visited products ------------------ -->

    <!--recommending products for the most visited products ------------------------------->

 @if(!empty($gmv_products))
<p><ul><h4 style="color:Orange;"><b>Most visited Products</b></h4></ul></p>

        <div class="row equal">
               @foreach($gmv_products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">{!!html_entity_decode(str_limit($product->description, $limit = 100, $end = '...   ')) !!}</p>
                                <div class="clearfix">
                               <div class="row">
                                   <div class="col-xs-12 col-sm-4 ">
                                      <div class="pull-left price">${{ $product->price }}</div>

                                   </div>
                                    <div class="col-xs-12 col-sm-4 ">
                                       <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
                                   class="btn btn-success pull-right" role="button">Add to Cart</a>

                                   </div>

                                    <div class=" col-xs-12 col-sm-4 ">
                                       <a href="{{ route('product.details', ['id' => $product->id]) }}"
                                   class="btn btn-warning pull-right" role="button">details</a>

                                   </div>

                               </div>


                            </div>
                        </div>
                    </div>

                </div>
                @endforeach

        </div>

  @endif


<hr>

<!--------------------------------------------------------------------------------------------->







 <!-- displaying products from the databse  without recommending -->





 @if(!empty($products))

 <h4 style="color:Orange;"><b>Products from DB</b></h4>

         <div class="row equal">


                @foreach($products as $product)
                 <div class="col-sm-6 col-md-4 col-lg-3">
                     <div class="thumbnail">
                         <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                         <div class="caption">
                             <h3>{{ $product->title }}</h3>
                             <div class="description">{{ strip_tags(str_limit($product->description, $limit = 100, $end = '...   ')) }}</div>
                                  <div class="clearfix">
                                <div class="row">
                                  <div class="price">
                                    <span class="badge-success badge">${{ $product->price }}</span>
                                  </div>
                                     <div class="col-xs-6 col-sm-6 ">
                                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
                                    class="btn btn-success pull-right" role="button">Add to Cart</a>

                                    </div>

                                     <div class="col-xs-6 col-sm-6 ">
                                        <a href="{{ route('product.details', ['id' => $product->id]) }}"
                                    class="btn btn-warning pull-right" role="button">details</a>

                                    </div>

                                </div>


                             </div>
                         </div>
                     </div>

                 </div>
                 @endforeach

         </div>

   @endif

















   <br><br><br>


   @if(count($products)>0)

        <div class="row clearfix">
            <div class="col-sm-6 col-md-6 col-md-offset-4">
                {{ $products->links() }}
            </div>
        </div>
    @endif
@endsection


@section('scripts')
    <!--the location of geolocation and ajax code to be implemented -->

<!-- below script to make all img responsive, these img inside content so can't apply bootstrap img-responsive  -->
    <!-- <script type="text/javascript">
        $(document).ready(function() {
          $("img").removeAttr('width')
            .removeAttr('height')
            .addClass("img-responsive");

    });
    </script> -->
@endsection
