/**
 * Created by meir on 26/04/17.
 */
$(document).ready(function () {


    $(".getstudentfromlevel").click(function (e) {
      var levelid=this.id.substring(2);
        $(".getstudent").click(function (e) {
            var id = this.id.substring(1);
            $.ajax({
                url: "../classes/panel_action.php",
                method: "POST",
                data: {action: 'GetClassStudents', class_id: id, level_id: levelid},
                success: function (data) {
                    $('#StudentsList'.concat(id)).html(data);

                }
            });
        });
    });



    if($("#levelTable").length != 0) {
        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {action: 'getLevels'},
            success: function (data) {
                alert(data);
                $('#levelTable').html(data);

            }
        });
    }


    $("#showteasher").click(function (e) {
        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {action: 'showteacherss'},
            success: function (data) {
                alert(data);
                $('#teachers').html(data);

            }
        });
    });
});