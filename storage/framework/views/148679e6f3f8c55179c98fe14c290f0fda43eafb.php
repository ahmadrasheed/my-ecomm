<?php $__env->startSection('title'); ?>
    Laravel Shopping Cart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.carousel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <!--recommending products for the logged in user--------------------------------------------->

<ul><h4 style="color:Orange;"><p><b>about the product</b></p></h4></ul>

        <div class="row">



                <div class="col-sm-6 col-md-4 col-lg-12">
                    <div class="thumbnail">
                        <img src="<?php echo e(URL::to($productD->imagePath)); ?>" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3><?php echo e($productD->title); ?></h3>

                            <div id="detail" class="description"><?php echo html_entity_decode ($productD->description ); ?></div>
                            <div class="clearfix">
                                <div class="pull-left price">$<?php echo e(html_entity_decode ($productD->price)); ?></div>
                                <a href="<?php echo e(route('product.addToCart', ['id' => $productD->id])); ?>"
                                   class="btn btn-success pull-right" role="button">Add to Cart</a>
                                   &nbsp;&nbsp;&nbsp;
                                   <a href="<?php echo e(route('product.details', ['id' => $productD->id])); ?>"
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
<p ><ul><h3 style="color:Orange;"><a href=<?php echo e(route('product.index')); ?>> back to main page</a></h3></ul></p>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("img").removeAttr('width');
        $("img").removeAttr('height');
        $("img").addClass("img-responsive");
        alert("hey");
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>