/**
 * Created by meir on 26/04/17.
 */
$(document).ready(function () {
    $(".getstudent").click(function (e) {
      var id=this.id.substring(1);
        $.ajax({
          url: "../classes/panel_action.php",
          method: "POST",
          data: {action: 'GwtClassStudents', class_id: id},
          success: function (data) {
              $('#StudentsList'.concat(id)).html(data);

          }
        });
    });
});