<?php $__env->startSection('title'); ?>
    Laravel Shopping Cart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('geolocation'); ?>



    <!--    ==========================important for Ajax call    ======================    -->
  <meta name="csrf-token" content="<?php echo csrf_token() ?>" />

 <!--  to put the path of the route that will serve the ajax call -->
    <script>
        var url="<?php echo e(route('createAjax')); ?>";
// alert(url);

    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.carousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<!----------------------------------------search form ---------------------------------------- -->


<!--battery API implementaion-->



<div class="row">

   <div class="col-lg-4 col-lg-offset-4">
       <form class="form-inline" method="get" action="<?php echo e(route('products.search_index')); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control " name="search"  id="search" >
                                <button type="submit" name="add" class="btn btn-success form-control">Search for a Product </button>
                                <?php /* <a href="#" class="btn btn-info fa fa-trash" role="button"></a>*/ ?>
                            </div>

                            <?php echo e(csrf_field()); ?>

                        </form>

  </div><!-- /.col-lg-6 -->
</div>

   <br>
    <!-- checking some messages -->
    <?php if(Session::has('success')): ?>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    <?php echo e(Session::get('success')); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="ahmad"><p></p></div>

       <?php if(Session::has('search_results')): ?>
        <div class="row">
                <div class="col-sm-12">
                   <div class="alert <?php echo e(Session::get('alert_type')); ?> fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> <?php echo e(Session::get('search_results')); ?>

                                 <?php echo e(Session::flush()); ?>

                        </strong>

                  </div>
             </div>
         </div>

    <?php endif; ?>

<!------------------to view products according to geolocation of the user using Ajax call-->
<h3 id='title'></h3>
  <div class="row equal" id="geolocation">

    <div id="gif" class="col-xs-6 col-xs-offset-5">

        <img class="text-center img-responsive" width="50px" height="50px" id="gif" src="ajax-loader.gif" alt="ajax-loader">

    </div>


  </div>
  <hr>



<!-- hidden div -->



   <!--recommending products for the logged in user--------------------------------------------->

<h3 id='title2'></h3>
   <div class="row equal" id="geolocation2">

     <div id="gif2" class="col-xs-6 col-xs-offset-5">

         <img class="text-center img-responsive" width="50px" height="50px" id="gif" src="ajax-loader.gif" alt="ajax-loader">

     </div>


   </div>



   <!-- End of recommending products for the logged in user -->



    <!--recommending products for the logged in user from by country --------------------------------------------->
<!--  <?php if(!empty($recommended_items2)): ?>

<p><ul><h4 style="color:Orange;"><b>Recommended for you from your country</b></h4></ul></p>

        <div class="row equal">
            <?php foreach($recommended_items2 as $item): ?>

               <?php foreach($item as $product): ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <img src="<?php echo e($product->imagePath); ?>" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3><?php echo e($product->title); ?></h3>
                            <p class="description"><?php echo html_entity_decode(str_limit($product->description, $limit = 100, $end = '...   ')); ?></p>
                                 <div class="clearfix">
                               <div class="row">
                                   <div class="col-xs-12 col-sm-4 ">
                                      <div class="pull-left price">$<?php echo e($product->price); ?></div>

                                   </div>
                                    <div class="col-xs-12 col-sm-4 ">
                                       <a href="<?php echo e(route('product.addToCart', ['id' => $product->id])); ?>"
                                   class="btn btn-success pull-right" role="button">Add to Cart</a>

                                   </div>

                                    <div class=" col-xs-12 col-sm-4 ">
                                       <a href="<?php echo e(route('product.details', ['id' => $product->id])); ?>"
                                   class="btn btn-warning pull-right" role="button">details</a>

                                   </div>

                               </div>


                            </div>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>

  <?php endif; ?> -->









<!-- ------------------------------adding data from the most visited products ------------------ -->

    <!--recommending products for the most visited products ------------------------------->




 <!-- here are the code paste in in desktop  -->










<!--------------------------------------------------------------------------------------------->






<hr>
 <!-- displaying products from the databse  without recommending -->





 <?php if(!empty($products)): ?>

 <h4 style="color:Orange;"><b>Products from DB</b></h4>

         <div class="row equal">


                <?php foreach($products as $product): ?>
                 <div class="col-sm-6 col-md-4 col-lg-3">
                     <div class="thumbnail">
                         <img src="<?php echo URL::to($product->imagePath); ?>" alt="..." class="img-responsive">
                         <div class="caption">
                             <h3><?php echo e($product->title); ?></h3>
                             <div class="description"><?php echo e(strip_tags(str_limit($product->description, $limit = 100, $end = '...   '))); ?>

                             </div>
                                  <div class="clearfix">
                                <div class="row">
                                  <div class="price">
                                    <span class="badge-success badge">$<?php echo e($product->price); ?></span>
                                  </div>
                                     <div class="col-xs-6 col-sm-6 ">
                                        <a href="<?php echo e(route('product.addToCart', ['id' => $product->id])); ?>"
                                    class="btn btn-success pull-right" role="button">Add to Cart</a>

                                    </div>

                                     <div class="col-xs-6 col-sm-6 ">
                                        <a href="<?php echo e(route('product.details', ['id' => $product->id])); ?>"
                                    class="btn btn-warning pull-right" role="button">details</a>

                                    </div>

                                </div>


                             </div>
                         </div>
                     </div>

                 </div>
                 <?php endforeach; ?>

         </div>

   <?php endif; ?>








   <br><br><br>


   <?php if(count($products)>0): ?>

        <div class="row clearfix">
            <div class="col-sm-6 col-md-6 col-md-offset-4">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <!--the location of geolocation and ajax code to be implemented -->

<!-- below script to make all img responsive, these img inside content so can't apply bootstrap img-responsive  -->
    <!-- <script type="text/javascript">
        $(document).ready(function() {
          $("img").removeAttr('width')
            .removeAttr('height')
            .addClass("img-responsive");

    });
    </script> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>