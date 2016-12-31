<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">


            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo e(route('product.index')); ?>"><!--<img src="<?php echo e(URL::to('')); ?>"  class="logo">--></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">



            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo e(route('product.shoppingCart')); ?>">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    
    

                          <?php echo e(trans('messages.cart')); ?> <!--using the language feature, locale-->
                         
                        <span class="badge"><?php echo e(Session::has('cart') ? Session::get('cart')->totalQty : ''); ?></span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
                               
                                  <?php echo e(trans('messages.user-management')); ?>

                                  <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if(Auth::check()): ?>
                            <li><a href="<?php echo e(route('user.profile')); ?>"><i class="fa fa-users" aria-hidden="true"></i>
                                    User Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(route('user.logout')); ?>">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                      <?php echo e(trans('messages.logout')); ?></a></li>
                        <?php else: ?>
                            
                            
                        <li><a href="<?php echo e(route('user.signin')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i><?php echo e(trans('messages.sign-in')); ?></a></li>
                            <li><a href="<?php echo e(route('user.signup')); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                      <?php echo e(trans('messages.sign-up')); ?></a></li>

                        <?php endif; ?>
                            <li><a href="<?php echo e(route('categories.index')); ?>"><i class="fa fa-database" aria-hidden="true"></i>
                                      <?php echo e(trans('messages.admin')); ?></a>


                            </li>

                    </ul>

                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>