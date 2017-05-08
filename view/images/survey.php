<?php
    include ("../database/survey_query.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>survey</title>
    <link rel="stylesheet" type="text/css" href="survey.css">
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css">
</head>
<body>
<a href="#newtask" uk-toggle>klba</a>
        <div id="newtask" uk-modal="center: true" class="model">
            <div class="uk-modal-dialog">
                <div class="uk-modal-body" >
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label" style="color: #0f6ecd;">Headline</label>
                        <div class="col-10">
                            <input class="form-control" type="text" placeholder="Type" id="example-text-input" style="font-size:18px;">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label"style="color: #0f6ecd;">Description</label>
                        <div class="col-10">
                            <textarea class="form-control" type="text"  id="example-text-input"rows="3" style="font-size:18px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-datetime-local-input" class="col-2 col-form-label"style="color: #0f6ecd;">Date and time</label>
                        <div class="col-10">
                            <input class="form-control" type="datetime-local" value="2017-4-22T13:45:00"
                                   id="example-datetime-local-input">
                        </div>
                    </div

                </div>
                <div class="uk-modal-footer uk-text-right">
                    <div class="form-group row">
                        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                        <button class="uk-button uk-button-primary uk-modal-close" type="button">Confirm</button>
                        <div class="fix"></div>
                    </div>
                </div>
            </div>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
</body>

</html>