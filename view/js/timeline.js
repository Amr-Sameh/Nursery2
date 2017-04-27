/**
 * Created by MeGaCrazy on 4/22/2017.
 */
$(document).ready(function () {
    $('a').click(function () {
        $('.tl-circ').hide();
    });
    $('.btn btn-success').click(function () {
        $('.tl-circ').hide();
    });
    $('.timeline').mouseenter(function () {
        $('.tl-circ').show();
    });
    $('.page-header').mouseenter(function () {
        $('.tl-circ').show();
    });
    $('.tldate').mouseenter(function () {
       $('.tldate').css("")
    });
});