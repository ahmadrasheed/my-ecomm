@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
@include('partials.carousel')
   <!--recommending products for the logged in user--------------------------------------------->

<ul><h4 style="color:Orange;"><p><b>about the product</b></p></h4></ul>

        <div class="row">



                <div class="col-sm-6 col-md-4 col-lg-12">
                    <div class="thumbnail">

                        <!-- <img src="{{URL::to($productD->imagePath)}}" alt="..." class="img-responsive"> -->
                        <img src="{!! html_entity_decode ($productD->imagePath )!!}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $productD->title }}</h3>

                            <div id="detail" class="description">{!! html_entity_decode ($productD->description )!!}</div>
                            <div class="clearfix">
                                <div class="pull-left price">${{html_entity_decode ($productD->price) }}</div>
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







<!--displaying video about the products-->

   <div class="container">
    <div class="row">
       <h4>Watch a video about the products specification:</h4>


       <iframe id="youtube" width="800" height="400" src="https://www.youtube.com/embed/Q6dsRpVyyWs" frameborder="0" allowfullscreen></iframe>

   </div>
   </div>

   <div id="close">close me</div>





<hr>
<hr>
<p ><ul><h3 style="color:Orange;"><a href={{ route('product.index') }}> back to main page</a></h3></ul></p>



@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        $("img").removeAttr('width');
        $("img").removeAttr('height');
        $("img").addClass("img-responsive");
        alert("hey");
});
</script>

@endsection
