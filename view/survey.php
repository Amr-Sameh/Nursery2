<?php
    include ("../database/survey_query.php");
    include ("static/header.php");
    include ("navbar.php");
?>
<!DOCTYPE html>
<html>
<head>
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

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
</body>

</html>
