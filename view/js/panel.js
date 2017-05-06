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
                    $('#StudentsList'.concat(id)).html(data);

                }
            });
        });
    });


    if ($("#levelTable").length != 0) {
        getlevels();
    }
    if ($("#classTable").length != 0) {
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
                if (data == "Operation Success") {
                    alert(data);
                }else{
                    alert(data);
                }
                add_stud[0].reset();
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

                if (data == "Operation Success") {
                    alert(data);
                }else{
                    alert("Some Error happen");

                }
                add_tech[0].reset();
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






