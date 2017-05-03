/**
 * Created by meir on 26/04/17.
 */
$(document).ready(function () {

$.ajax({
  url:"../classes/panel_action.php",
    method:"POST",
    data:{action:'GwtClassStudents',class_id:1},
    success:function (data) {
    alert(data);
  $('#StudentsList').html(data);

    }
});

});