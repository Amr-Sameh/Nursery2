<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 15/04/17
 * Time: 09:59 ص
 */
include_once 'static/header.php';
include_once 'navbar.php' ;

include_once '../classes/event_class.php';
$event = new event_class();

if(!isset($_GET['page']))
    $_GET['page']=1;
$start=4*($_GET['page']-1);
$events=$event->getevent_from($start ,4);
$event_slider=$event->getevent_from(0 ,4);
?>

    <!-- slider start -->



    <div  id="carousel-example-generic" class="carousel slide container" data-ride="carousel">
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
                    <h1>'; echo $first['title']; echo '</h1>

                </div>
            </div>
        ';

            foreach ($event_slider as $val){

                echo '
                         <div class="item ">
                <img src="images/shof_d92fc1d1e3beb1a.jpg" alt="...">
                <div class="carousel-caption">
                    <h1>';  echo $val['title'];  echo '</h1>
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


    <h1 class="h1">Last Added<span> Event</span> </h1>

    <!-- event div start -->



<?php
foreach ($events as $single_event){
    echo '<div class="event container wow bounceInDown">
                        <div class="img col-lg-4">
                            <img class="wow bounceInLeft" src=" ' . $event->get_defult_pic($single_event['event_id'])['image_url']. '">
                         </div>
                            <div class="content col-lg-4">
                            <div class="title wow bounceInRight" ><a href="evnt_page.php?id='.$single_event['event_id'].'"> ' .
        $single_event['title'].
        ' </a></div>
                            <h2 class="wow bounceInLeft">'.$single_event['date'].'</h2>
                            <h2 class="title wow bounceInRight">'.$single_event['place'].'</h2>
                            <p class="wow bounceInLeft">'.$single_event['content'].'</p>
                           <a href="evnt_page.php?id='.$single_event['event_id'].'">More</a> 
                        </div>
                     </div>';
}
?>


    <!--end event div-->






<?php
$page_num=$event->page_num(4);
include_once 'paging.php';
include_once 'static/footer.php';