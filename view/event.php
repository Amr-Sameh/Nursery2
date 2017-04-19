<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 15/04/17
 * Time: 09:59 ص
 */
include_once 'static/header.php';
include_once 'navbar.php';
$events=array("mot5lef","iuouiouioui uioui oui ouio uio","hhhhh hhhhhh hh hhh hhhhhh","jjjjj jjjj jjj jjj");
?>

<!-- slider start -->





    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <?php
            $num=count($events);
            for ($i=1;$i<$num;$i++) {
                echo '  <li data-target="#carousel-example-generic" data-slide-to="';
                echo $i;
                echo '"></li>';
            }
            ?>



        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner eventslider" role="listbox">
        <?php
        $first=array_shift($events);
        echo ' <div class="item active">
                <img class="img-responsive" src="images/event.jpg" alt="...">
                <div class="carousel-caption">
                    <h1>'; echo $first; echo '</h1>

                </div>
            </div>
        ';

                    foreach ($events as $val){

                        echo '
                         <div class="item">
                <img src="images/event.jpg" alt="...">
                <div class="carousel-caption">
                    <h1>';  echo $val;  echo '</h1>
                </div>
            </div>
                        
                        ';
                    }

        ?>




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







<!--slider end-->


<div class="container text-center">







</div>




<?php
include_once 'static/footer.php';
