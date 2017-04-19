/**
 * Created by meir on 15/03/17.
 */
$(document).ready(function () {

    
    $(".layer").css("opacity","100");

    $(".login").css({
        "top":"10%",
        "opacity":"100"
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




});