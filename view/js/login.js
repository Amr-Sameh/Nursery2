/**
 * Created by meir on 15/03/17.
 */
$(document).ready(function () {

    $('#login-btn').click(function () {
        $(".layer").css("opacity","100");
        $(".layer").css("z-index","5");
        $(".login").css({
            "top":"10%",
            "opacity":"100"
        });
    });
    $(".layer").click(function () {
        $(".layer").css("opacity","0");
        $(".layer").css("z-index","-5");
        $(".login").css({
            "top":"-100%",
            "opacity":"0"
        });
    });
    var mq = window.matchMedia( "(max-width: 768px)" );
    if (mq.matches){
        $(".login").css("top","0%");
    }
   window.onresize = function() {
        if (mq.matches){
            $(".login").css("top","0%");
        }else {
        $(".login").css({
            "top":"10%",
        });
        }
    };

    /**
     * validate
     */
    var username;
    var pass;
    $(".btn-login").click(function () {
        if ($(".username").val()==""){
            $(".username").css("border","0.5px solid RED");
        }else {
            $(".username").css("border","none");

        }
        if ($(".password").val()==""){
            $(".password").css("border","0.5px solid RED");

        }else {
            $(".password").css("border","none");

        }
    });
    $('#login-form').submit(function (e) {
        e.preventDefault();
        var action ='login';
        var username=$('#username').val();
        var password=$('#password').val();
        $.ajax({
            url: "navbar.php",
            method: "POST",
            data: {action: action, username: username, password: password},
            success: function (data) {


                if (data == 1) {

                    location.href="homee.php";

                }else {  //TODO add validate part to tell the user that the data not right
                     }
            }
        })
    });




});