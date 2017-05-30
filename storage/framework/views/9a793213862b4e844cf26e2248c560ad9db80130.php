<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>User Profile</h1>
            <hr>
            <h2>My Orders</h2>
            <?php foreach($orders as $order): ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php foreach($order->cart->items as $item): ?>
                                <li class="list-group-item">
                                    <span class="badge">$<?php echo e($item['price']); ?></span>
                                    <?php echo e($item['item']['title']); ?> | <?php echo e($item['qty']); ?> Units
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price: $<?php echo e($order->cart->totalPrice); ?></strong>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="<?php echo e(route('product.index')); ?>" class="btn btn-primary">Back to main page</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>