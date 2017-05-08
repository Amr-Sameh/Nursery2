<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 02/05/17
 * Time: 11:50 م
 */
if($_SERVER['REQUEST_METHOD']=='POST') {



    if (isset($_POST['action'])) {


# get class students for the panel
        if ($_POST['action'] == 'GetClassStudents') {
            include_once 'classs.php';
            $class = new classs();


            $studentsList = $class->get_class_students($_POST['class_id']);
            $studentAsTable = '';
            foreach ($studentsList as $student) {
                $subname=$class->git_class_by_id($student['class_id'])['class_name'];
                $levelname=$class->git_level_by_id($student['level_id'])['name'];
                echo $subname.$levelname;
                $studentAsTable .= ' <tr>';
                $studentAsTable .= ' <td><div class=" uk-border-circle" style="width: 50px;height: 50px;overflow: hidden;padding: 0; ">';
                $studentAsTable .= ' <img class="" width="100%" height="100%" src="images/child-only.png">';
                $studentAsTable .= ' </div></td>
                                                        <td >';
                $studentAsTable .= ' <a class="uk-link-reset"  >' . $student['first_name'] . " " . $student['mid_name'] . " " . $student['last_name'] . '</a>';//grap the name from user table
                $studentAsTable .= '</td><td>' . $student['stu_id'] . '</td>';
                $studentAsTable .= ' <td><button class="uk-button uk-button-default" type="button" uk-toggle="target: #r' . $student['stu_id'] . '; animation: uk-animation-slide-left, uk-animation-slide-bottom">view</button></td>';
                $studentAsTable .= ' <td><button class="uk-button uk-button-primary" id="'.$student['stu_id'].'" type="button" >edit</button></td>
                        <td><a class="uk-button uk-button-danger" >delete</a></td>';
                $studentAsTable .= '</tr><tr id="r' . $student['stu_id'] . '" class="uk-card uk-card-default uk-card-body uk-margin-small" hidden="hidden" aria-hidden="true">
                                <td  >Username : <br>E-mail : <br>Emargancy Person name : <br>Emargancy Person relation : <br>Emargancy Person phone : <br>level : <br>Birthdate : </td><td><label id="username'.$student["stu_id"].'">'.$student["username"].'</label><br><label id="email'.$student["stu_id"].'">'.$student["email"].'</label><br><label id="emrg_persone_name'.$student["stu_id"].'">'.$student["emrg_persone_name"].'</label><br><label id="emrg_persone_relation'.$student["stu_id"].'">'.$student["emrg_persone_relation"].'</label><br><label id="emrg_persone_phone'.$student["stu_id"].'">'.$student["emrg_persone_phone"].'</label><br><label id="level'.$student["stu_id"].'">'.$levelname.'</label><br><label id="class'.$student["stu_id"].'">'.$student["birth_date"].'</label></td>
                                <td  >Gender : <br>Password : <br>country : <br>city : <br>street : <br>class : </td><td>';

                if($student["gender"]==0){
                    $studentAsTable .="Female"."<br>".$student["password"];
                }else{
                    $studentAsTable .="male"."<br>".$student["password"];
                }
                $studentAsTable .='<br>'.$student["country"].'<br>'.$student["city"].'<br>'.$student["street"].'<br>'.$subname.'</td></tr>';

            }

            echo $studentAsTable;
            exit();


        }


        if ($_POST['action'] == 'addclasstoteacher') {
        include "teacher.php";
        $te=new teacher();
        $te->addteacherclass($_POST['class_id'],$_POST['teacherid']);
        }

        if ($_POST['action'] == 'showteacher') {
            include_once 'classs.php';
            $class = new classs();
            include_once 'teacher.php';
            $teacher = new teacher();
            $teachersList = $teacher->get_all_teachers();
            $studentAsTable = '';
            foreach ($teachersList as $student) {
                $subname=$class->git_sub_by_id($student['teacher_id'])['name'];
                $studentAsTable .= ' <tr>';
                $studentAsTable .= ' <td><div class=" uk-border-circle" style="width: 50px;height: 50px;overflow: hidden;padding: 0; ">';
                $studentAsTable .= ' <img class="" width="100%" height="100%" src="images/child-only.png">';
                $studentAsTable .= ' </div></td>
                                                        <td >';
                $studentAsTable .= ' <a class="uk-link-reset"  >' . $student['first_name'] . " " . $student['mid_name'] . " " . $student['last_name'] . '</a>';//grap the name from user table
                $studentAsTable .= '</td><td>' . $student['teacher_id'] . '</td>';
                $studentAsTable .= ' <td><button class="uk-button uk-button-default" type="button"  uk-toggle="target: #S' . $student['teacher_id'] . '; animation:  uk-animation-slide-left, uk-animation-slide-bottom">view</button></td>';
                $studentAsTable .= ' <td><button class="uk-button uk-button-primary klklkl"id="sd'.$student["teacher_id"].'" type="button" href="#tr" uk-toggle>edit</button></td>
                        <td><button class="uk-button uk-button-danger" type="button">delete</button></td>';
                $studentAsTable .= '</tr><tr id="S' . $student['teacher_id'] . '" class="uk-card uk-card-default uk-card-body uk-margin-small" hidden="hidden" aria-hidden="true">
                                <td  >Username : <br>E-mail : <br>level : <br>Birthdate : </td><td><label id="username'.$student["teacher_id"].'">'.$student["username"].'</label><br><label id="email'.$student["teacher_id"].'">'.$student["email"].'</label><br><label id="level'.$student["teacher_id"].'">'.$subname.'</label><br><label id="class'.$student["teacher_id"].'">'.$student["birth_date"].'</label></td>
                                <td  >Gender : <br>Password : <br>country : <br>city : <br>street : <br>class : </td><td>';

                if($student["gender"]==0){
                    $studentAsTable .="Female"."<br>".$student["password"];
                }else{
                    $studentAsTable .="male"."<br>".$student["password"];
                }
                $studentAsTable .='<br>'.$student["country"].'<br>'.$student["city"].'<br>'.$student["street"].'<br>'.'</td></tr>';

            }

            echo $studentAsTable;
            exit();


        }


        if ($_POST['action'] == 'getLevels') {

            include_once 'level_class.php';
            $level = new level_class();
            $levelList = $level->get_all_levels();
            $levelAsTable = '';
            $i = 1;
            foreach ($levelList as $singleLevel) {
                $levelAsTable .= '<tr>';
                $levelAsTable .= '<th scope="row">' . $i . '</th>';
                $levelAsTable .= ' <td>' . $singleLevel['name'] . '</td>';
                $levelAsTable .= ' <td>' . $singleLevel['id'] . '</td>';
                $levelAsTable .= '<td><button class="btn-lg btn-success panel_edit_level" name="' . $singleLevel['name'] . '" id="edit_level' . $singleLevel['id'] . '" data-toggle="modal" data-target="#myModal"  >Edit</button></td>';
                $levelAsTable .= '<td><button class="btn-lg btn-danger panel_delete_level" id="delete_level' . $singleLevel['id'] . '">Delete</button></td>';
                $levelAsTable .= '<td><button class="btn-lg btn-primary panel_view_level" id="View_level' . $singleLevel['id'] . '">View <i class="fa fa-eye" aria-hidden="true"></i></button></td>';
                $levelAsTable .= '</tr>';

                $i++;

            }
            echo $levelAsTable;
            exit();


        }


        if ($_POST['action'] == 'addLevel') {

            include_once 'level_class.php';
            $level = new level_class();
            $level->add_level($_POST['name']);

            echo 'true';
            exit();

        }


        if ($_POST['action'] == 'deleteLevel') {
            include_once 'level_class.php';
            $level = new level_class();
            $level->remove_level($_POST['id']);

            echo 'true';
            exit();

        }

        if ($_POST['action'] == 'getLevelInfo') {
            include_once 'level_class.php';
            $level = new level_class();
            $level_info = $level->get_level_by_id($_POST['id']);
            $subList = $level->get_level_subjects($_POST['id']);
            $subinfo = '   <h1 class="text-center text-primary" id="level_info_name">' . $level_info['name'] . '</h1>';
            $subinfo .= '
    <table class="table level_info_Table">
        <thead>
        <tr>
            <th>#</th>
            <th>Subject Name</th>

        </tr>
        </thead>
        <tbody id="level_info_Table">';
            $i = 1;
            foreach ($subList as $singlesub) {
                $subinfo .= '<tr>';
                $subinfo .= '<th scope="row">' . $i . '</th>';
                $subinfo .= '<td>' . $singlesub['name'] . '</td>';
                $subinfo .= '</tr>';
                $i++;
            }
            $subinfo .= ' </tbody>
    </table>
<button class="btn-danger btn-lg col-xs-4 col-xs-offset-4" id="level_info_Table_close">Close</button>';

            echo $subinfo;
            exit();
        }

        if ($_POST['action'] == 'Leveledit_getAllSub') {
            include_once '../classes/subject.php';
            include_once '../classes/level_class.php';
            $level = new level_class();
            $level_id = $level->get_level_id($_POST['level']);
            $subject = new subject();
            $subList = $subject->get_all_subjects_not_in_level($level_id);
            foreach ($subList as $sub) {
                $suboption .= '<option value="' . $sub['id'] . '">' . $sub['name'] . '</option>';
            }
            echo $suboption;
            exit();
        }



        if ($_POST['action'] == 'update_level') {
            include_once '../classes/level_class.php';
            include_once '../classes/subject.php';
            $level = new level_class();
            $sub = new subject();
            $level_id = $level->get_level_id($_POST['level']);
            $level->edit_level($_POST['level'], $_POST['newlevel']);
            if (isset($_POST['sub'])) {
                $sub_id_list = $_POST['sub'];
                $level->add_subject($level_id, $sub_id_list);
            }
            echo 'true';
            exit();


        }




        if ($_POST['action'] == 'addStudent') {
            include_once '../classes/student.php';
            $user = new user();
            $user_id = $user->insert_user($_POST['first_name'], $_POST['mid_name'], $_POST['last_name'], $_POST['gender'], 3);
            $stu=new student();
            $stu->insert_student($user_id, $_POST['level_id'], $_POST['class_id']);
            echo "Operation Success";
            exit();
        }

        if($_POST['action']=='all_level_add_stud'){
            include_once 'level_class.php';
            $level = new level_class();
            $levelList = $level->get_all_levels();
            $level_option='';
            $level_option.='<option value="' . -2 . '">' ."---" . '</option>';
            foreach ($levelList as $level){
              $level_option.='<option value="' . $level['id'] . '">' . $level['name'] . '</option>';
            }
            echo $level_option;
            exit();

        }
        if($_POST['action']=='get_classes_add_stud'){
            include_once '../classes/level_class.php';
            $level_id=$_POST['id'];
            $classe=new level_class();
            $classlist=$classe->get_level_classes_by_level_id($level_id);
            $class_option='';
            foreach ($classlist as $class){
                 $class_option.='<option value="' . $class['class_id'] . '">' . $class['class_name'] . '</option>';
            }

            echo  $class_option;
            exit();
        }





        if ($_POST['action'] == 'addTeacher') {
            include_once '../classes/user.php';
            include_once '../classes/teacher.php';
            $user = new user();
            $user_id = $user->insert_user($_POST['first_name'], $_POST['mid_name'], $_POST['last_name'], $_POST['gender'], 2);
            $tech = new teacher();
            $tech->addnewTeacher($user_id, $_POST['subject']);
            echo "Operation Success";
            exit();
        }

if ($_POST['action'] == 'all_system_sub_asSelect'){
            include_once '../classes/subject.php';
    $subject = new subject();
    $subList = $subject->get_all_subjects();
    $suboption='';
    foreach ($subList as $sub) {
        $suboption .= '<option value="' . $sub['id'] . '">' . $sub['name'] . '</option>';
    }
    echo $suboption;
    exit();
}











        // start class part








        if ($_POST['action'] == 'getClassesforlevel') {
            include_once 'classs.php';
            $class = new classs();
            $classList = $class->get_all_class_for_level($_POST['level_id']);
            $classAsTable = '


            <button class=" btn-lg btn-primary col-xs-offset-2 panel_add_class_btn" id="panel_add_class_btn'.$_POST['level_id'].'"> Add Class <i class="fa fa-plus-circle" aria-hidden="true"></i> </button>
            <br>
            <br>
                
                
                <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Class - Name</th>
                <th>Max - Student</th>
                <th>Student - Number</th>


            </tr>
            </thead>
            <tbody  >';
            $i = 1;
            foreach ($classList as $singleClass) {
                $classAsTable .= '<tr>';
                $classAsTable .= '<th scope="row">' . $i . '</th>';
                $classAsTable .= ' <td>' . $singleClass['class_name'] . '</td>';
                $classAsTable .= ' <td>' . $singleClass['students_num'] . '</td>';
                $classAsTable .= ' <td>' . $singleClass['max_student_num'] . '</td>';
                $classAsTable .= '<td><button class="btn-lg btn-success panel_edit_class" id="edit_class'.$singleClass['class_id'].'$'.$singleClass['level_id'].'" data-toggle="modal" data-target="#class_edit_model">Edit</button></td>';
                $classAsTable .= '<td><button class="btn-lg btn-danger panel_delete_class " id="delete_class'.$singleClass['class_id'].'$'.$singleClass['level_id'].'">Delete</button></td>';
                $classAsTable .= '</tr>';
                $i++;
            }
            $classAsTable.='
            </tbody>
            </table>';
            echo $classAsTable;
            exit();
        }











        if ($_POST['action'] == 'getClasses_level_tabs') {

            include_once 'level_class.php';
            $level = new level_class();
            $levelList = $level->get_all_levels();
            $levelAsTabs = ' <ul class="nav nav-tabs" role="tablist" >';

            foreach ($levelList as $singleLevel){
                $levelAsTabs.=' <li class="nav-item">
                    <a class="nav-link panel_class_level_link_tab" data-toggle="tab" href="#l" role="tab" id="'.$singleLevel['id'].'">'.$singleLevel['name'].'</a>
                </li>';
            }
            $levelAsTabs.='</ul> <div class="tab-content">';
           // foreach ($levelList as $singleLevel) {
                $levelAsTabs .= '<div class="tab-pane " id="l" role="tabpanel"></div>';
           // }
            $levelAsTabs.='</div>';
            echo $levelAsTabs;
            exit();
        }



        if ($_POST['action'] == 'add_class_to_level') {
            include_once '../classes/classs.php';
            $class=new classs();
            $level_id=$_POST['level_id'];

            $class->add_class($_POST['name'],$_POST['max'],$level_id);
                echo 'true';
            exit();


        }


        if ($_POST['action'] == 'delete_class') {
            include_once '../classes/classs.php';
            $class=new classs();
            $class_id=$_POST['class_id'];
            $class->delete_class($class_id);
            echo 'true';
            exit();


        }

        if ($_POST['action'] == 'update_class') {
            include_once '../classes/classs.php';
            $class=new classs();
            $class->update_class($_POST['class_id'],$_POST['max'],$_POST['name']);
            echo 'true';
            exit();
        }
















        //event part



        if ($_POST['action'] == 'getEvents') {
    include_once '../classes/event_class.php';
            $event = new event_class();
            $eventList = $event->get_all_events();
            $eventAsTable = '';
            $i = 1;
            foreach ($eventList as $events) {
                $eventAsTable .= '<tr>';
                $eventAsTable .= '<th scope="row">' . $i . '</th>';
                $eventAsTable .= '<td>' . $events['title'] . '</td>';
                $eventAsTable .= '<td><button class="btn-lg btn-success panel_edit_event" id="edit_event'.$events['event_id'] . '"  data-toggle="modal" data-target="#event_edit_model" >Edit</button></td>';
                $eventAsTable .= '<td><button class="btn-lg btn-danger panel_delete_event" id="delete_event'.$events['event_id'] . '">Delete</button></td>';
                $eventAsTable .= '<td><button class="btn-lg btn-primary panel_view_event" id="View_event'.$events['event_id'] . '">View <i class="fa fa-eye" aria-hidden="true"></i></button></td>';
                $eventAsTable .= '</tr>';
                $i++;
            }
            echo $eventAsTable;
            exit();
        }


        if($_POST['action']=='getEventInfo'){
            include_once '../classes/event_class.php';
            $event=new event_class();
            $event_info = $event->get_event_Info($_POST['id']);
            $eventInfo = '   <h1 class="text-center text-primary" id="level_info_name">' . $event_info['title'] . '</h1>';
            $eventInfo ='
            <table class="table">
            <thead>
                <tr>
                    <th>Event img</th>
                    <th>Event Title</th>      
                </tr>
            </thead>
            <tbody id="Event_info_table">
            ';

            $i=1 ;
            foreach ($eventList as $singleevent){
                $eventInfo.= '<tr>';
                $eventInfo.= '<th scope="row"> '. $i .'</th>';
                $eventInfo.= '<td>'.$singleevent['title'].'</td>';
                $eventInfo.= '</tr>';
                $i++ ;
            }
            $eventInfo.='</tbody>
                         </table>
                         <button class="btn-danger btn-lg col-xs-4 col-xs-offset-4" id="level_info_Table_close">Close</button>';
            echo $eventInfo;
            exit();
        }


        if($_POST['action']=='addEvent'){
            include_once '../classes/event_class.php';
            $event = new event_class();
            $event->add_event($_POST['content'],$_POST['title'],$_POST['date'],$_POST['place'],$_POST['image']);

        exit();
        }


        if($_POST['action']=='deleteEvent'){
            include_once '../classes/event_class.php';
            $event=new event_class();
            $event->delet_event($_POST['id']);

            echo 'true' ;
            exit ();
        }


        if($_POST['action']=='update_event'){
            include_once '../classes/event_class.php';
            $event=new event_class();
            $event->update_event($_POST['title'],$_POST['content'],$_POST['place'],$_POST['date'],$_POST['image'],$_POST['id']);
                echo 'true';
            exit();
        }
































    }
}

