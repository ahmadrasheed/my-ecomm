<?php $__env->startSection('content'); ?>


    <div class="list-group">
    <h4>
        <a href="<?php echo e(route('categories.index')); ?>" class="list-inline"> Categories:</a>&nbsp;<i class="fa fa-tags" aria-hidden="true"></i>
        <a href="<?php echo e(route('admin.products.index')); ?>" class="list-inline"> Products:</a>&nbsp;<i class="fa fa-tags" aria-hidden="true"></i>
    </h4>
   </div>
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



    <?php if(count($products)>0): ?>
    <div class="row">

        <div class="col-sm-12 col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">

                    <div class="list-group">
                        <?php foreach($products as $product): ?>

                            <form class="form-inline" method="post" action="<?php echo e(route('products.updateOrdelete')); ?>">
                                <div class="form-group">
                                    <span class="badge"><?php echo e(0); ?></span>
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

<?php else: ?>
        <h2>sorry, No Items in this category. Please below add some.</h2>
    <?php endif; ?>

<?php /*
    ====================================Adding new products by category ======================
*/ ?>
    <div class="row">


        <div class="col-sm-12 col-md-12">



            <div class="panel panel-default">
                <div class="panel-heading">Add products To Category:<?php echo e($category_name); ?><b></b></div>

                <div class="panel-body">

                    <div class="list-group">

                        <form class="form-inline" method="post" action="<?php echo e(route('products.add')); ?>">
                            <div class="form-group">

                                <input type="text" class="form-control " name="title" id="name" >


                                <button type="submit" name="add" class="btn btn-success form-control">Add New Product </button>

                                <?php /* <a href="#" class="btn btn-info fa fa-trash" role="button"></a>*/ ?>
                                <input type="hidden" name="category_id" value="<?php echo e($category_id); ?>">

                            </div>

                            <?php echo e(csrf_field()); ?>

                        </form>



                    </div>
                </div>
            </div>

        </div>



    </div>


    </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>