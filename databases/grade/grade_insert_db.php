<?php

session_start();
/**	
 * 	
 * 등급리스트 입력 db	
 * 	
 * @file : grade_insert_db.php	
 * @author : ParkSeongHyun	
 * @since : 2021-03-24
 * @desc : 	
 * 	
 */
require_once('../../dbconn.php');

$login_id = $_SESSION['login_id'];

//POST변수	
$grade_title = $_POST['grade_title']; //등급명	
$grade_no = $_POST['grade_no']; //등급순위

$reg_id = $login_id;
$mod_id = $login_id;

//등급리스트 insert Query	
$iSql = "INSERT INTO PSM_USER_GRADE(grade_title, grade_no, reg_id, mod_id)";
$iSql .= " VALUES('$grade_title','$grade_no','$reg_id','$mod_id')";
$result = mysqli_query($conn, $iSql);
if ($result == false) {
    echo mysqli_error($conn);
} else {
    header('Location: ../../admin/grade/grade.php');
}

$conn->close();
