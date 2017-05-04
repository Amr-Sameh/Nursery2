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
       getlevels();
    }
    if($("#classTable").length != 0) {
       getClasses();
    }


    $("#showteasher").click(function (e) {
        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {action: 'showteacher'},
            success: function (data) {
                $('#teachers').html(data);

            }
        });
    });



    $('#add_level').click(function () {
            var level_name = $('#panel_add_level_input').val();

        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {action: 'addLevel',name:level_name},
            success: function (data) {
              if(data=='true'){
              getlevels();

              }

            }
        });
    });
     $('#add_class').click(function () {
            var class_name = $('#panel_add_level_input').val();
            var max_number = $('#panel_add_max_number_input').val();
            var level_id = $('#panal_add_level_number_input').val();

        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {action: 'addClass',class_name:class_name,max_number:max_number,level_id:level_id},
            success: function (data) {
              if(data=='true'){
              getClasses();

              }

            }
        });
    });




});



$(document).on('click','.panel_delete_level',function () {

    var level_id=this.id;
    level_id=level_id.substr(level_id.lastIndexOf('l')+1);


    $.ajax({
        url: "../classes/panel_action.php",
        method: "POST",
        data: {action: 'deleteLevel',id:level_id},
        success: function (data) {

getlevels();


        }
    });

});
$(document).on('click','.panel_delete_class',function () {

    var class_id=this.class_id;
    class_id=class_id.substr(class_id.lastIndexOf('s')+1);


    $.ajax({
        url: "../classes/panel_action.php",
        method: "POST",
        data: {action: 'deleteClass',id:class_id},
        success: function (data) {

getClasses();


        }
    });

});


$(document).on('click','.panel_view_level',function () {
    $('#level_info').fadeToggle();
    var level_id=this.id;
    level_id=level_id.substr(level_id.lastIndexOf('l')+1);

    getlevelinfo(level_id);
});
$(document).on('click','#level_info_Table_close',function () {
    $('#level_info').fadeToggle();
});

function getlevels() {
    $.ajax({
        url: "../classes/panel_action.php",
        method: "POST",
        data: {action: 'getLevels'},
        success: function (data) {

            $('#levelTable').html(data);

        }
    });
}
    function getlevelinfo(id) {

        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {action: 'getLevelInfo',id:id},
            success: function (data) {

                $('#level_info').html(data);

            }
        });

    }

    $(document).on('click','.panel_delete_class',function () {

    var class_id=this.id;
    class_id=class_id.substr(class_id.lastIndexOf('c')+1);


    $.ajax({
        url: "../classes/panel_action.php",
        method: "POST",
        data: {action: 'deleteClass',class_id:class_id},
        success: function (data) {

getClasses();


        }
    });

});


   /* $('#add_class').click(function () {
            var class_name = $('#panel_add_class_input').val();
            var max_number = $('#panal_add_max_number_input').val();
            var level_name = $('#panal_add_level_name_input').val();

        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {action: 'addClass',class_name:class_name, level_name:level_name, max_student_number:max_number},
            success: function (data) {
              if(data=='true'){
                   getClasses();

              }

            }
        });
    });
*/
    function getClasses(){
        $.ajax({
            url:"../classes/panel_action.php",
            method:"POST",
            data: {action:'getClasses'},
            success: function(data){
                $('#classTable').html(data);
            }
        })
    }



