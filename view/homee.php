<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 13/04/17
 * Time: 11:01 ص
 */
include_once 'static/header.php';
include_once 'navbar.php'
?>


<div class="home">
<!-- slider part -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->


        <!-- Wrapper for slides -->
        <div class="carousel-inner homeslider" role="listbox">
            <div class="item active">
                <img src="images/slider4.jpg" alt="">
                <div class="carousel-caption">

                </div>
            </div>
            <div class="item">
                <img src="images/slider2.jpeg" alt="">
                <div class="carousel-caption">

                </div>
            </div>
            <div class="item">
                <img src="images/slider3.jpg" alt="">
                <div class="carousel-caption">

                </div>
            </div>
            <div class="item">
                <img src="images/slider5.jpg" alt="">
                <div class="carousel-caption">

                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>







<!-- end slider part -->


<!-- start features Us -->

<div class="features container text-center">

                             <div data-wow-delay="0.3s" class="feat col-lg-3 col-md-6 col-sm-12 wow bounceInLeft">

                                 <img src="images/1.png">
                                 <h3>HAPPY ENVIRONMENT</h3>


                                 </div>

                        <div data-wow-delay="0.7s" class="feat col-lg-3 col-md-6 col-sm-12 wow bounceInDown">

                            <img src="images/2.png">
                            <h3>ACTIVE LEARNING</h3>


                        </div>

                        <div data-wow-delay="0.7s" class="feat col-lg-3 col-md-6 col-sm-12 wow bounceInDown">

                            <img src="images/3.png">
                            <h3>CREATIVE LESSONS</h3>


                        </div>

                        <div data-wow-delay="1.2s" class="feat col-lg-3 col-md-6 col-sm-12 wow bounceInRight">

                            <img src="images/4.png">
                            <h3>AMAZING PLAYGROUND</h3>


                        </div>




</div>






<!-- end features Us -->








</div>

<?php
include_once 'paging.php';
include_once 'static/footer.php';
