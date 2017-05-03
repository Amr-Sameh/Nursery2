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
            $i=0;
            foreach ($levelList as $singleLevel){
            $levelAsTable.='<tr>';
                $levelAsTable.='<th scope="row">'.$i.'</th>';
                $levelAsTable.=' <td>'.$singleLevel['name'].'</td>';
                $levelAsTable.=' <td>'.$singleLevel['id'].'</td>';
                $levelAsTable.='<td><button class="btn-lg btn-success">Edit</button></td>';
                $levelAsTable.='<td><button class="btn-lg btn-danger">Delete</button></td>';
                $levelAsTable.='</tr>';

                $i++;

            }
            echo $levelAsTable;
            exit();




        }

































    }
}