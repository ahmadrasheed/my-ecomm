<?php $__env->startSection('title'); ?>
    Laravel Shopping Cart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('geolocation'); ?>



    <!--    ==========================important for Ajax call    ======================    -->
  <meta name="csrf-token" content="<?php echo csrf_token() ?>" /> 
  
 <!--  to put the path of the route that will serve the ajax call -->
    <script> 
        var url="<?php echo e(route('createAjax')); ?>"; 
        
        
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
  
  <div class="row" id="geolocation">
    
    <div id="gif" class="col-xs-6 col-xs-offset-5">
       
        <img class="text-center" id="gif" src="ajax-loader.gif" alt="ajax-loader"> 
        
    </div>
    
    
  </div>
  
  
   
   <!--recommending products for the logged in user--------------------------------------------->
<?php if(!empty($recommended_items)): ?>    
<p><ul><h4 style="color:Orange;"><b>Recommended for you</b></h4></ul></p>
        
        <div class="row equal">
            <?php foreach($recommended_items as $item): ?>
               
               <?php foreach($item as $product): ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <img src="<?php echo e($product->imagePath); ?>" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3><?php echo e($product->title); ?></h3>
                            <p class="description"><?php echo e($product->description); ?></p>
                     
                        
                        
                        <hr>
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
    
  <?php endif; ?>
    
    
<hr>

    <!--recommending products for the logged in user from by country --------------------------------------------->
<?php if(!empty($recommended_items2)): ?> 

<p><ul><h4 style="color:Orange;"><b>Recommended for you from your country</b></h4></ul></p>
        
        <div class="row equal">
            <?php foreach($recommended_items2 as $item): ?>
               
               <?php foreach($item as $product): ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <img src="<?php echo e($product->imagePath); ?>" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3><?php echo e($product->title); ?></h3>
                            <p class="description"><?php echo e($product->description); ?></p>
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
    
  <?php endif; ?>
    
    
<hr>







<!--------------------------------adding data from the most visited products -------------------->

    <!--recommending products for the most visited products ------------------------------->
 
<?php if(!empty($gmv_products)): ?>    
<p><ul><h4 style="color:Orange;"><b>Most visited Products</b></h4></ul></p>
        
        <div class="row equal"> 
               <?php foreach($gmv_products as $product): ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <img src="<?php echo e($product->imagePath); ?>" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3><?php echo e($product->title); ?></h3>
                            <p class="description"><?php echo e($product->description); ?></p>
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
        
        </div>
    
  <?php endif; ?>
    
    
<hr>

<!--------------------------------------------------------------------------------------------->





<p><ul><h3 style="color:Orange">products from DB</h3></ul></p>   
    
  
<!--  ------------ displaying products from the databse  without recommending------------------->

        <!--<?php foreach($products->chunk(4) as $productChunk): ?>-->
          <div class="row equal">
            <?php foreach($productChunk as $product): ?>
                <div class="col-sm-6 col-md-4 col-lg-3 pull-left">
                    <div class="thumbnail">
                        <img src="<?php echo e($product->imagePath); ?>" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3><?php echo e($product->title); ?></h3>
                            <p class="description"><?php echo e($product->description); ?></p>
                            <hr>
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
       </div> 
 <!--   <?php endforeach; ?>-->

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
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>