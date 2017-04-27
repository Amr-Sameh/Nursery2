<?php
<<<<<<< HEAD
include 'static/header.php';
include 'navbar.php'
=======
    //include ("../database/survey_query.php");
    include ("static/header.php");
    include ("navbar.php");
>>>>>>> 3cccb8c86be8ffaa876f088a3444403206081716
?>

<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
	<title>Survey</title>
	<link rel="stylesheet" type="text/css" href="css/survey.css">
	<script src = "js/survey.js"></script>
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
	<div class="uk-child-width-1-2@s uk-grid-match survey-contanier omer" uk-grid>
    <div>
        <div class="uk-card uk-card-primary  uk-card-body uk-light new-survey">
            <h3 class="uk-card-title">New Survey</h3>
            <p>This Will Allow To Make A New Survey With A New DeadLine</p>
            <button class = "make-survey uk-button uk-button-primary">GO</button>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-primary  uk-card-body uk-light old-survey">
            <h3 class="uk-card-title">Old Survey</h3>
            <p>This Will Allow To Show The Old Survey</p>
            <button class = "show-survey uk-button uk-button-primary">GO</button>
        </div>
    </div>
    </div>
    <!--Survey Div-->
    <!--Make Survey Form-->
    <!--<div class="survey-form">  

    <form>
        <fieldset class="uk-fieldset">


            <div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Survey Tilte">
            </div>

            <div class="uk-margin">
                <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
            </div>

            <div class="uk-margin">
                <input id = "datepicker" class="uk-input hasDatePicker" type="text" placeholder="Survey DeedLine">
            	<input class="form-control" type="datetime-local" value="2017-04-26T13:45:00" name="tl_date" value="2017-4-22T13:45:00" id="example-datetime-local-input" >
            </div>
			
			<div class="uk-margin">
                <input class="uk-input" type="text" placeholder="Survey Tilte">
            </div>


        </fieldset>
    </form>

</div>
    <!--Make Survey Form-->
    <div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">

    <!-- Form code begins -->
    <form method="post">
      <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
     	
     	 <label class="control-label" for="date">Date</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>

         <label class="control-label" for="date">Date</label>
        <textarea class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"></textarea>
      
      </div>
     
      <div class="form-group"> <!-- Submit button -->
        <button class="btn btn-primary " name="submit" type="submit">Submit</button>
      </div>
     </form>
     <!-- Form code ends --> 

    </div>
  </div>    
 </div>
</div>
</div>
<!--Contanier Div-->

<script src = "js/survey.js"></script>
=======
    <title>survey</title>
    <link rel="stylesheet" type="text/css" href="css/survey.css">
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css">
</head>
<body>
<header class="intro-header" style="background-image: url('images/kids-004.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Survey</h1>
                        <hr class="small">
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                        <div>
                            <div class="uk-card uk-card-primary uk-card-body">
                                        <h3 class="uk-card-title">Survey-Title</h3>
                                        <p>Surve-Body</p>
                            <div class="uk-margin">
                                <div class="uk-form-label">Answer</div>
                                    <div class="uk-form-controls">
                                        <label><input class="uk-radio" type="radio" name="radio1"> Option 01</label><br>
                                        <label><input class="uk-radio" type="radio" name="radio1"> Option 02</label>
                                </div>
                                    </div>
                            </div>
                            
                        </div>
                </div>
                <hr>
        </div>
    </div>

    <hr>
>>>>>>> 3cccb8c86be8ffaa876f088a3444403206081716
</body>
<?php
include_once 'static/footer.php';

<<<<<<< HEAD
=======
</html>
<?php
 include "static/footer.php"
?>
>>>>>>> 3cccb8c86be8ffaa876f088a3444403206081716
