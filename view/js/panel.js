/**
 * Created by meir on 26/04/17.
 */
$(document).ready(function () {


    $(".getstudentfromlevel").click(function (e) {
        var levelid = this.id.substring(2);
        $(".getstudent").click(function (e) {
            var id = this.id.substring(1);
            $.ajax({
                url: "../classes/panel_action.php",
                method: "POST",
                data: {action: 'GetClassStudents', class_id: id, level_id: levelid},
                success: function (data) {
                    alert(data);
                    $('#StudentsList'.concat(id)).html(data);
                }
            });
        });
    });


    if ($("#levelTable").length != 0) {
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
            data: {action: 'addLevel', name: level_name},
            success: function (data) {
                if (data == 'true') {
                    getlevels();

                }

            }
        });
    });


    $(document).on('click', '.panel_delete_level', function () {

        var level_id = this.id;
        level_id = level_id.substr(level_id.lastIndexOf('l') + 1);


        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {action: 'deleteLevel', id: level_id},
            success: function (data) {

                getlevels();


            }
        });

    });

    /*
     *
     *  add_stud
     * */
    var add_stud = $('#panel_add_stud');
    add_stud.submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: add_stud.serialize() + "&action=addStudent",
            success: function (data) {
                add_stud[0].reset();
                    var win = window.open(data, '_blank');
                    win.focus();


            }
        });
    });

    if($("#all_level_add_stud").length!=0){
        all_level_add_stud();
    }
    $('#all_level_add_stud').change(function () {
       $.ajax({
         url:"../classes/panel_action.php",
         method:"POST",
         data:{action: 'get_classes_add_stud',id: $('#all_level_add_stud option:selected').val()},
         success:function (data) {
             $('#all_class_for_level').html(data);
         }


       });

    });







    /*
     *  add tech
     * */

    var add_tech = $('#panel_add_tech');
    add_tech.submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: add_tech.serialize() + "&action=addTeacher",
            success: function (data) {
                add_tech[0].reset();
                var win = window.open(data, '_blank');
                win.focus();

            }
        });
    });
    if ($("#panel_add_tech").length != 0) {

//TODO call function return all system subject in <option> tag with sub_id as value
        get_all_system_sub();
    }


    $(document).on('click', '.panel_view_level', function () {
        $('#level_info').fadeToggle();
        var level_id = this.id;
        level_id = level_id.substr(level_id.lastIndexOf('l') + 1);

        getlevelinfo(level_id);
    });
    $(document).on('click', '#level_info_Table_close', function () {
        $('#level_info').fadeToggle();
    });


    $(document).on('click', '.panel_edit_level', function () {
        var level = this.getAttribute('name');
        $('#myModalLabel').html(level);
        document.getElementById('level_new_name').disabled = true;

        document.getElementById('level_new_name').value = level;

        getallsubjects(level);


    });

    $('#level_new_name_toogle').click(function () {
        $('#level_new_name').removeAttr('disabled');

    });


    $('#update_level').click(function () {

        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {
                action: 'update_level',
                level: document.getElementById('myModalLabel').innerHTML,
                sub: $('#edit_level_multilist').val(),
                newlevel: document.getElementById('level_new_name').value
            },
            success: function (data) {
                $('#myModalLabel').html(document.getElementById('level_new_name').value);
                getallsubjects(document.getElementById('myModalLabel').innerHTML);
                getlevels();
                if (data == 'true')
                    alert('Level Updated');
                else
                    alert('some Error happened');

            }
        });
    });






// start class part

    if ($("#panel_class_levels_tabs").length != 0) {


get_levels_as_tabs();


    }




    $(document).on('click', '.panel_class_level_link_tab', function () {


        get_level_classes(this.id);

    });




    $(document).on('click', '.panel_add_class_btn', function () {

        var level_id = this.id;
        level_id = level_id.substr(level_id.lastIndexOf('n') + 1);
       addclasstolevel(level_id);

    });


    $(document).on('click', '.panel_delete_class', function () {

        var class_and_level_id=this.id;

       var class_and_level_id=class_and_level_id.substr(class_and_level_id.lastIndexOf('s') + 1);
       class_and_level_id=class_and_level_id.split("$");
delete_class(class_and_level_id[0],class_and_level_id[1]);

    });


    $(document).on('click','.panel_edit_class',function () {
        var class_and_level_id=this.id;

        var class_and_level_id=class_and_level_id.substr(class_and_level_id.lastIndexOf('s') + 1);
        class_and_level_id=class_and_level_id.split("$");
        $('#edit_class_submit').html(' <button name="'+class_and_level_id[0]+'" type="button" class="btn btn-primary submit_class_edit" id="'+class_and_level_id[1]+'">Save changes</button>');
    });

    $(document).on('click','.submit_class_edit',function () {
var class_id=this.name;
var level_id=this.id;
var class_name=$('#class_name_update').val();
var max_stu = $('#class_max_update').val();

        $.ajax({
            url:"../classes/panel_action.php",
            method:"POST",
            data:{action:'update_class',class_id:class_id,name:class_name,max:max_stu},
            success: function (data) {
                get_level_classes(level_id);
            }
        });

    });













    //start event

    if ($("#eventTable").length != 0) {
        getEvents();
    }


    $('#add_event').click(function () {
        var ev_content = $('#panel_add_event_content').val();
        var ev_title = $('#panel_add_event_title').val();
        var ev_date = $('#panel_add_event_date').val();
        var ev_place = $('#panel_add_event_place').val();
        var ev_image_url = '../view/images/2.jpg';
        $.ajax({
            url:"../classes/panel_action.php",
            method:"POST",
            data:{action:'addEvent',content:ev_content ,title:ev_title,date:ev_date ,place:ev_place,image:ev_image_url},
            success: function (data) {
                    getEvents();

            }
        });



    });


    $(document).on('click','.panel_delete_event',function () {

        var event_id=this.id ;
        event_id=event_id.substr(event_id.lastIndexOf('t')+1);

        $.ajax({
            url:"../classes/panel_action.php",
            method:"POST",
            data:{action:'deleteEvent',id:event_id},
            success:function (data) {
                getEvents();

            }
        });
    });



    $(document).on('click','.panel_view_event',function () {



        var event_id=this.id ;
        event_id=event_id.substr(event_id.lastIndexOf('t')+1);

        var win = window.open('evnt_page.php?id='+event_id, '_blank');
        win.focus();
    });


    $(document).on('click','.panel_edit_event',function () {


        var event_id=this.id ;
        event_id=event_id.substr(event_id.lastIndexOf('t')+1);
        $('#edit_event_submit').html(' <button name="'+event_id+'" type="button" class="btn btn-primary submit_event_edit">Save changes</button>');


    });


    $(document).on('click','.submit_event_edit',function () {

        var event_id=this.name;
        var title = $('#panel_edit_event_title').val();
        var date = $('#panel_edit_event_date').val();
        var place = $('#panel_edit_event_place').val();
        var content = $('#panel_edit_event_content').val();
        var image='../view/images/2.jpg';
        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {action: 'update_event', content:content ,title:title,date:date ,place:place,image:image,id:event_id},
            success: function (data) {
               getEvents();

            }

            });

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
            data: {action: 'getLevelInfo', id: id},
            success: function (data) {

                $('#level_info').html(data);

            }
        });

    }

    function getallsubjects(level) {

        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {action: 'Leveledit_getAllSub', level: level},
            success: function (data) {

                $('#edit_level_multilist').html(data);
            }
        });
    }

   function all_level_add_stud() {
       $.ajax({
           url:"../classes/panel_action.php",
           method:"POST",
           data:{action:'all_level_add_stud'},
           success:function (data) {
               $('#all_level_add_stud').html(data);
           }

       });
   }




    function get_all_system_sub() {
        $.ajax({
            url: "../classes/panel_action.php",
            method: "POST",
            data: {action: 'all_system_sub_asSelect'},
            success: function (data) {
                $('#add_tech_sub').html(data);
            }
        });
    }


function get_levels_as_tabs() {
    $.ajax({
        url: "../classes/panel_action.php",
        method: "POST",
        data: {action: 'getClasses_level_tabs'},
        success: function (data) {
            $('#panel_class_levels_tabs').html(data);
        }
    });
}
function get_level_classes(id) {
    $.ajax({
        url: "../classes/panel_action.php",
        method: "POST",
        data: {action: 'getClassesforlevel',level_id:id},
        success: function (data) {
            $('#panel_classTable').html(data);
        }
    });
}





function addclasstolevel(id) {
    var name =$('#panel_add_class_input').val();
    var max = $('#panel_add_max_number_input').val();
    $.ajax({
        url: "../classes/panel_action.php",
        method: "POST",
        data: {action: 'add_class_to_level',level_id:id,name:name,max:max},
        success: function (data) {
get_level_classes(id);
        }
    });


}


function delete_class(class_id,level_id) {
    $.ajax({
        url: "../classes/panel_action.php",
        method: "POST",
        data: {action: 'delete_class',class_id:class_id},
        success: function (data) {
            get_level_classes(level_id);

        }
    });

}

function getEvents() {
    $.ajax({
        url: "../classes/panel_action.php",
        method:"POST",
        data:{action:'getEvents'},
        success:function (data) {
            $('#eventTable').html(data);
        }

    });
}






