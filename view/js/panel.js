/**
 * Created by meir on 26/04/17.
 */
$(document).ready(function () {

  $('#panel-page').height($(window).height()-$('.navbar-default').height()-2);
  $('.component').height($(window).height()-$('.navbar-default').height()-2);
  $('.push-left-nav').height($(window).height()-$('.navbar-default').height()-2);
  $('.uk-offcanvas-bar').height($(window).height()-$('.navbar-default').height()-2);
  $('.uk-offcanvas-overlay').height($(window).height()-$('.navbar-default').height()-2);
  $('.stu-panel-link').height($('.stu-panel-pic').height);

});