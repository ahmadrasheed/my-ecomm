<?php $__env->startSection('content'); ?>





    <h3> Products&nbsp;<i class="fa fa-tags" aria-hidden="true"></i></h3>

    <?php if(Session::has('success')): ?>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    <?php echo e(Session::get('success')); ?>

                    <?php echo e(Session::forget('success')); ?>

                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php /*=====================Search for a products==================*/ ?>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Products Management:</div>
                <div class="panel-body">
                  <div class="col-sm-6">
                    <div class="list-group">
                        <form class="form-inline" method="get" action="<?php echo e(route('products.search')); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control " name="search"  id="search" >
                                <button type="submit" name="add" class="btn btn-success form-control">Search for a Product </button>
                                <?php /* <a href="#" class="btn btn-info fa fa-trash" role="button"></a>*/ ?>
                            </div>

                            <?php echo e(csrf_field()); ?>

                        </form>
                      </div>
                    <!-- </div> end col-sm-6 -->

                </div>
                <div class="col-sm-6">
                  <a href="<?php echo e(route('products.add')); ?>"  name="add" class="btn btn-success col-sm-3 ">Add new product </a>
                </div>
            </div>

        </div>

    </div>

    </div>


 <?php /* ===============================display All products  ========================*/ ?>
<?php if(isset($products)): ?>
    <div class="row">

        <div class="col-sm-12 col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">All Products:</div>

                <div class="panel-body">

                    <div class="list-group">
                        <?php foreach($products as $product): ?>

                            <form class="form-inline" method="post" action="<?php echo e(route('products.updateOrdelete')); ?>">
                                <div class="form-group">
                                    <span class="badge"><?php echo e(6); ?></span>
                                    <input type="text" class="form-control " value="<?php echo e($product->title); ?>" name="title" id="name" >
                                    <input type="text" class="form-control " value="<?php echo e($product->price); ?> $" name="price" id="name" size="4">

                                    <textarea name="description"  class="form-control " rows="1" cols="40"><?php echo e($product->description); ?></textarea>

                                    <button type="submit" name="update" class="btn btn-primary form-control">update</button>
                                    <button type="submit" name="delete" class="btn btn-danger form-control">delete </button>

                                    <?php /* <a href="#" class="btn btn-info fa fa-trash" role="button"></a>*/ ?>

                                </div>
                                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                <?php echo e(csrf_field()); ?>

                            </form>


                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <?php endif; ?>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>