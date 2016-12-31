<?php $__env->startSection('content'); ?>





<h3> Categories&nbsp;<i class="fa fa-tags" aria-hidden="true"></i></h3>

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

<div class="row">

<div class="col-sm-12 col-md-12">



        <div class="panel panel-default">
            <div class="panel-heading">All Categories:</div>

                <div class="panel-body">

                    <div class="list-group">
                        <?php foreach($categories as $category): ?>


                            <div class="form-group">
                            <form class="form-inline" method="post" action="<?php echo e(route('categories.updateOrdelete')); ?>">


                                    <input type="text" class="form-control " value="<?php echo e($category->name); ?>" name="name" id="name" >


                                <button type="submit" name="update" class="btn btn-primary form-control">update me</button>
                                
                                <button type="submit" name="delete" class="btn btn-danger form-control">delete </button>
                                
                                 <button type="submit" name="view" class="btn btn-warning form-control">view all products </button>

                              
                                <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
                                <?php echo e(csrf_field()); ?>
                            </form>
                                         
                            
                            </div>

<?php /*
                            ========       View button on categories page ===========
*/ ?>

                        <?php endforeach; ?>
                    </div>
                </div>
        </div>

</div>


</div>


<div class="row">


    <div class="col-sm-12 col-md-12">



        <div class="panel panel-default">
            <div class="panel-heading">All Categories:</div>

            <div class="panel-body">

                <div class="list-group">

                        <form class="form-inline" method="post" action="<?php echo e(route('categories.add')); ?>">
                            <div class="form-group">

                                <input type="text" class="form-control " name="name" id="name" >


                                <button type="submit" name="add" class="btn btn-success form-control">Add New Category </button>

                                <?php /* <a href="#" class="btn btn-info fa fa-trash" role="button"></a>*/ ?>

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