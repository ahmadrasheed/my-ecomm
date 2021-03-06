
<!-- Carousel
       ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="<?php echo e(URL::to('caresoul/image_2.jpg')); ?>" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <?php /*<h1>Ecommece: shop now!.</h1>
                    <p>Shop now: everything you need, just looking for it and buy right away!.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>*/ ?>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" 
            src="<?php echo e(URL::to('caresoul/image_1.png')); ?>"
              alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1></h1>
                    <p></p>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide"  src="<?php echo e(URL::to('caresoul/image_4.jpg')); ?>" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1></h1>
                    <p></p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->