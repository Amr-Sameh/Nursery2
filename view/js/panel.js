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



$(document).on('click','.panel_view_level',function () {
    $('#level_info').fadeToggle();
    var level_id=this.id;
    level_id=level_id.substr(level_id.lastIndexOf('l')+1);

    getlevelinfo(level_id);
});
$(document).on('click','#level_info_Table_close',function () {
    $('#level_info').fadeToggle();
});



$(document).on('click','.panel_edit_level',function () {
var level = this.getAttribute('name');
$('#myModalLabel').html(level);
    document.getElementById('level_new_name').disabled=true;

document.getElementById('level_new_name').value=level;

getallsubjects(level);


});

$('#level_new_name_toogle').click(function () {
    $('#level_new_name').removeAttr('disabled');

});

$('#edit_level_multilist').on(function () {
   alert($('#multilist').val());
});


$('#update_level').click(function () {
    $.ajax({
        url: "../classes/panel_action.php",
        method: "POST",
        data: {action: 'update_level',level:document.getElementById('myModalLabel').innerHTML,sub:$('#edit_level_multilist').val(),newlevel:document.getElementById('level_new_name').value},
        success: function (data) {
            $('#myModalLabel').html(document.getElementById('level_new_name').value);
            getallsubjects(document.getElementById('myModalLabel').innerHTML);
            getlevels();
       if (data=='true')
            alert('Level Updated');
       else
           alert('some Error happened');

        }
    });
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

function getallsubjects(level) {
    $.ajax({
        url: "../classes/panel_action.php",
        method: "POST",
        data: {action: 'Leveledit_getAllSub',level:level},
        success: function (data) {
            $('#edit_level_multilist').html(data);

        }
    });
}
