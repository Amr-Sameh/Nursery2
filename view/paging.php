<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 15/04/17
 * Time: 03:56 م
 *
 *
 *
 * ====================================================================
 * ====================================================================
 * ===   add variable $page-num before include this page to use it  ===
 * ===             dont include if page number = 0 or = 1           ===
 * ====================================================================
 * ====================================================================
 *
 */
include_once 'static/header.php';
include_once 'navbar.php'
?>
<nav aria-label="Page navigation" class="container">
    <ul class="pagination">

            <?php

            if(!isset($_GET['page'])){
                $_GET['page']=1;
            }
            if(!isset($page_num)){
                $page_num=1;
            }
            if($_GET['page']==1 ){
                $pre_flag="disabled";
                $pre=$_SERVER['PHP_SELF']."?page=1";

            }else{
                $pre_flag="active";
                $pre=$_SERVER['PHP_SELF']."?page=".($_GET['page']-1);
            }
            if($_GET['page']==$page_num){
                $next_flag="disabled";
                $next=$_SERVER['PHP_SELF']."?page=".$page_num;

            }else{
                $next_flag="active";
                $next=$_SERVER['PHP_SELF']."?page=".($_GET['page']+1);
            }


            ?>
        <?php
        if($page_num!=0 || $page_num!=1){
            echo '';
        }
        ?>
        <li class="<?php echo $pre_flag?>">

            <a   href="<?php echo $pre;?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        for ($i=1;$i<=$page_num;$i++) {
            echo '<li class="';
            if ($_GET['page']==$i) { echo 'active';} else echo '';
            echo'"><a href="';echo $_SERVER['PHP_SELF']."?page=".$i;echo '">';
            echo $i;
            echo '</a></li>';
        }
        ?>

        <li class="<?php echo $next_flag?>">
            <a   href="<?php echo $next ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
<?php
include_once 'static/footer.php';