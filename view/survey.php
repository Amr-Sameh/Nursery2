<?php
include 'static/header.php';
include 'navbar.php'
?>

<!DOCTYPE html>
<html>
<head>
	<title>Survey</title>
	<link rel="stylesheet" type="text/css" href="css/survey.css">
</head>
<body>
<!--Contanier Div-->
<div class="container">
	<!--sub-banner Div-->
   <div class="gt_sub_banner_bg default_width">
        <div class="container">
            <div class="gt_sub_banner_hdg  default_width">
                <h3>Survey</h3>   
            </div>
        </div>
    </div>
    <!--sub-banner Div-->

    <!--Clear Div-->
    <div class="clear"></div>
	<!--Clear Div-->
	
	<!--Survey Div-->
	<div class="uk-child-width-1-2@s uk-grid-match survey-contanier" uk-grid>
    <div>
        <div class="uk-card uk-card-primary  uk-card-body uk-light new-survey">
            <h3 class="uk-card-title">New Survey</h3>
            <p>This Will Allow To Make A New Survey With A New DeadLine</p>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-primary  uk-card-body uk-light old-survey">
            <h3 class="uk-card-title">Old Survey</h3>
            <p>This Will Allow To Show The Old Survey Whish Thier DeadLine Had Come</p>
        </div>
    </div>
    </div>
    <!--Survey Div-->

</div>
<!--Contanier Div-->
</body>
<?php
include_once 'paging.php';
include_once 'static/footer.php';

