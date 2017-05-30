<?php $__env->startSection('title'); ?>
    Laravel Shopping Cart
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.carousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<!--battery API implementaion-->



<div class="row">





<p><ul><h3 style="color:Orange">products from DB</h3></ul></p>



<?php if(!empty($products)): ?>
      <?php foreach($products->chunk(4) as $productChunk): ?>


          <?php foreach($productChunk as $product): ?>
              <div class="col-sm-6 col-md-4 col-lg-3 pull-left">
                  <div class="thumbnail">
                      <img src="<?php echo e($product->imagePath); ?>" alt="..." class="img-responsive">
                      <div class="caption" style="overflow:hidden;">
                          <h3><?php echo e($product->title); ?></h3>
                          <p class="description"><?php echo html_entity_decode(str_limit($product->description, $limit = 100, $end = '...   ')); ?></p>
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
            <?php endif; ?>
       </div>


   <br><br><br>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>