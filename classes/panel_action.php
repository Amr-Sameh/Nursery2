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
            $studentAsTable ='';
            foreach ($studentsList as $student) {
                $studentAsTable .= ' <tr uk-toggle="target: #'.$student['stu_id'].'; animation:  uk-animation-slide-left, uk-animation-slide-bottom">';
                $studentAsTable .= ' <td><div class=" uk-border-circle" style="width: 50px;height: 50px;overflow: hidden;padding: 0; ">';
                $studentAsTable .= ' <img class="" width="100%" height="100%" src="images/child-only.png">';
                $studentAsTable.=' </div></td>
                                                        <td >';
                $studentAsTable .= ' <a class="uk-link-reset"  >' .$student['first_name']." ".$student['mid_name']." ".$student['last_name']. '</a>';//grap the name from user table
                $studentAsTable .= '</td><td>' . $student['stu_id'] . '</td>';
                $studentAsTable .= ' <td><button class="uk-button uk-button-default" type="button">edit</button></td>
                        <td><button class="uk-button uk-button-default" type="button">delete</button></td>';
                $studentAsTable .= '</tr><tr id="' . $student['stu_id'].'" class="uk-card uk-card-default uk-card-body uk-margin-small" hidden="hidden" aria-hidden="true">
                                <td  ><div >Level : </div></td>
                                <td ><div >Class : </div></td>
                                 <td ><div >Level : </div></td>
                                <td ><div >Class : </div></td>
                                 <td ><div >Level : </div></td>
                                <td ><div >Class : </div></td>
              </tr>';

            }

            echo $studentAsTable;
            exit();


        }


        if ($_POST['action'] == 'showteacherss') {


            include_once 'teacher.php';
            $teacher = new teacher();
            $teachersList = $teacher->get_all_teachers();
            $studentAsTable ='';
            foreach ($teachersList as $teacher) {
                $studentAsTable .= ' <tr uk-toggle="target: #S'.$teacher['teacher_id'].'; animation:  uk-animation-slide-left, uk-animation-slide-bottom">';
                $studentAsTable .= ' <td><div class=" uk-border-circle" style="width: 50px;height: 50px;overflow: hidden;padding: 0; ">';
                $studentAsTable .= ' <img class="" width="100%" height="100%" src="images/child-only.png">';
                $studentAsTable.=' </div></td>
                                                        <td >';
                $studentAsTable .= ' <a class="uk-link-reset"  >' .$teacher['first_name']." ".$teacher['mid_name']." ".$teacher['last_name']. '</a>';//grap the name from user table
                $studentAsTable .= '</td><td>' . $teacher['teacher_id'] . '</td>';
                $studentAsTable .= ' <td><button class="uk-button uk-button-default" type="button">edit</button></td>
                        <td><button class="uk-button uk-button-default" type="button">delete</button></td>';
                $studentAsTable .= '</tr><tr id="S' . $teacher['teacher_id'].'" class="uk-card uk-card-default uk-card-body uk-margin-small" hidden="hidden" aria-hidden="true">
                                <td ><div >aslkadsdjkalsdlkajskdljaskdjksajd dfklsdjfds fsdklfjsdkf dfkljsdlf dikfljsdkf diokfljsdkkf dklsfjsdlkfdkls;ad</div></td>
                                <td ><div >aslkadsdjkalsdlkajskdljaskdjksajd dfklsdjfds fsdklfjsdkf dfkljsdlf dikfljsdkf diokfljsdkkf dklsfjsdlkfdkls;ad</div></td>
                                <td></td>
                                <td></td>
              </tr>';

            }

            echo $studentAsTable;
            exit();



        }











        if ($_POST['action'] =='getLevels') {

            include_once 'level_class.php';
            $level = new level_class();
            $levelList=$level->get_all_levels();
            $levelAsTable='';
            $i=1;
            foreach ($levelList as $singleLevel){
            $levelAsTable.='<tr>';
                $levelAsTable.='<th scope="row">'.$i.'</th>';
                $levelAsTable.=' <td>'.$singleLevel['name'].'</td>';
                $levelAsTable.=' <td>'.$singleLevel['id'].'</td>';
                $levelAsTable.='<td><button class="btn-lg btn-success panel_edit_level" id="edit_level'.$singleLevel['id'].'">Edit</button></td>';
                $levelAsTable.='<td><button class="btn-lg btn-danger panel_delete_level" id="delete_level'.$singleLevel['id'].'">Delete</button></td>';
                $levelAsTable.='<td><button class="btn-lg btn-primary panel_view_level" id="View_level'.$singleLevel['id'].'">View <i class="fa fa-eye" aria-hidden="true"></i></button></td>';
                $levelAsTable.='</tr>';

                $i++;

            }
            echo $levelAsTable;
            exit();




        }


        if ($_POST['action'] =='addLevel') {

            include_once 'level_class.php';
            $level=new level_class();
            $level->add_level($_POST['name']);

            echo 'true';
            exit();

        }


        if ($_POST['action'] =='deleteLevel') {
            include_once 'level_class.php';
            $level=new level_class();
            $level->remove_level($_POST['id']);

            echo 'true';
            exit();

        }

        if ($_POST['action'] =='getLevelInfo') {
            include_once 'level_class.php';
            $level=new level_class();
            $level_info=$level->get_level_by_id($_POST['id']);
            $subList=$level->get_level_subjects($_POST['id']);
            $subinfo='   <h1 class="text-center text-primary" id="level_info_name">'.$level_info['name'].'</h1>';
            $subinfo.='
    <table class="table level_info_Table">
        <thead>
        <tr>
            <th>#</th>
            <th>Subject Name</th>

        </tr>
        </thead>
        <tbody id="level_info_Table">';
            $i=1;
            foreach ($subList as $singlesub){
                $subinfo.='<tr>';
                $subinfo.='<th scope="row">'.$i.'</th>';
                $subinfo.='<td>'.$singlesub['name'].'</td>';
                $subinfo.='</tr>';
                $i++;
            }
            $subinfo.=' </tbody>
    </table>
<button class="btn-danger btn-lg col-xs-4 col-xs-offset-4" id="level_info_Table_close">Close</button>';

            echo $subinfo;
            exit();
        }
       /* if ($_POST['action'] =='getClasses') {

            include_once 'class_class.php';
            $level = new class_class();
            $levelList=$level->get_all_classes();
            $levelAsTable='';
            $i=1;
            foreach ($classlList as $singleClass){
                $levelAsTable.='<tr>';
                $levelAsTable.='<th scope="row">'.$i.'</th>';
                $levelAsTable.=' <td>'.$singleClass['class_name'].'</td>';
                $levelAsTable.=' <td>'.$singleClass['class_id'].'</td>';
                $levelAsTable.=' <td>'.$singleClass['students_num'].'</td>';
                $levelAsTable.=' <td>'.$singleClass['max_student_num'].'</td>';
                $levelAsTable.=' <td>'.$singleClass['level_id'].'</td>';
                $levelAsTable.='<td><button class="btn-lg btn-success panel_edit_class" id="edit_level'.$singleLevel['id'].'">Edit</button></td>';
                $levelAsTable.='<td><button class="btn-lg btn-danger panel_delete_class" id="delete_level'.$singleLevel['id'].'">Delete</button></td>';
                $levelAsTable.='<td><button class="btn-lg btn-primary panel_view_class" id="View_level'.$singleLevel['id'].'">View <i class="fa fa-eye" aria-hidden="true"></i></button></td>';
                $levelAsTable.='</tr>';

                $i++;

            }
            echo $levelAsTable;
            exit();
       */

        }


























    }
}