<?php $__env->startSection('title'); ?>
    Laravel Shopping Cart
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.carousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!----------------------------------------search form ---------------------------------------- --> 




<form action="">
  First name:<br>
  <input type="text" name="firstname" value="">
  <br>
  Last name:<br>
  <input type="text" name="lastname" value="">
  <br><br>
  <input type="submit" value="Submit" id="submit">
</form> 

 
  
   
   <!--recommending products for the logged in user--------------------------------------------->
<?php if(!empty($recommended_items)): ?>    
<p><ul><h4 style="color:Orange;"><b>Recommended for you</b></h4></ul></p>
        
        <div class="row">
            <?php foreach($recommended_items as $item): ?>
               
               <?php foreach($item as $product): ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo e($product->imagePath); ?>" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3><?php echo e($product->title); ?></h3>
                            <p class="description"><?php echo e($product->description); ?></p>
                            <div class="clearfix">
                                <div class="pull-left price">$<?php echo e($product->price); ?></div>
                                <a href="<?php echo e(route('product.addToCart', ['id' => $product->id])); ?>"
                                   class="btn btn-success pull-right" role="button">Add to Cart</a>
                                   &nbsp;&nbsp;&nbsp;
                                   <a href="<?php echo e(route('product.details', ['id' => $product->id])); ?>"
                                   class="btn btn-warning pull-right" role="button">details</a>
                            </div>
                        </div>
                    </div>
                        
                </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    
  <?php endif; ?>
    
    <div id="div1">
        
        
    </div>
<hr>


   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<!--var url='<?php echo e(route('ajax')); ?>';-->
<script>
    $(document).ready(function(){
    var url='<?php echo e(route('ajax')); ?>

        
            $.ajax({
               type:'POST',
               url:url,
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data){
                   alert('yes yes');
                  $("#msg").html(data.msg);
               }
            });
        });
      </script>


<!--<script src="<?php echo e(URL::to('src/js/test.js')); ?>"></script>-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>