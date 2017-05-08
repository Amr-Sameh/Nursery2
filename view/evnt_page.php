<?php
/**
 * Created by PhpStorm.
 * User: fatma
 * Date: 5/2/2017
 * Time: 9:36 AM
 */
include_once 'static/header.php';
include_once 'navbar.php' ;
include_once '../classes/event_class.php';
$event=new event_class();
$event_Id=$_GET['id'];

$event_slider=$event->get_event_Pic($event_Id);
$event_info=$event->get_event_Info($event_Id);
?>

<div class="events container">
<div class="slider col-xs-6">
    <!-- slider start -->





    <div  id="carousel-example-generic" class="carousel slide container col-xs-12" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <?php
            $num=count($event_slider);
            for ($i=1;$i<$num;$i++) {
                echo '  <li data-target="#carousel-example-generic" data-slide-to="';
                echo $i;
                echo '"></li>';
            }
            ?>



        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
            $first=array_shift($event_slider);
            echo ' <div class="item active">
                <img class="img-responsive" src="images/childrens-events-story-times.jpg" alt="...">
                <div class="carousel-caption">
                   

                </div>
            </div>
        ';

            foreach ($event_slider as $val){

                echo '
                         <div class="item">
                <img src="'.$val['pic_url'].'" alt="...">
                <div class="carousel-caption">
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






</div>
    <!--slider end-->
<?php
   echo '<div class="info col-xs-6" >
        <h1>'.$event_info[0]['title'].'</h1>
        <date class="date">'.$event_info[0]['date'].'</date>
        <p>'.$event_info[0]['content'].'</p>
    </div>
</div>';
?>

<?php
include_once 'static/footer.php';