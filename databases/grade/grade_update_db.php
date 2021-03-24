<?php
session_start();
/**	
 * 	
 * 등급 수정 DB 페이지	
 * 	
 * @file : grade_update_db.php	
 * @author : ParkSeongHyun	
 * @since : 2020-09-29	
 * @desc : 등급 수정 DB 페이지	
 * 	
 */


include '../../dbconn.php';

$grade_idx = $_POST['idx']; //등급 고유index	
$grade_title = $_POST['grade_title']; //등급명	
$is_display = $_POST['is_display']; //사용유무	
$login_id = $_SESSION['login_id'];
$today = date("Y-m-d H:i:s");

$vSql = "UPDATE PSM_USER_GRADE";
$vSql .= " SET";
$vSql .= " grade_title='$grade_title', is_display='$is_display', mod_date='$today', mod_id='$login_id'";
$vSql .= " WHERE idx=$grade_idx";
$vResult = mysqli_query($conn, $vSql);

//실패시 에러 충력 성공시 메뉴 리스트로 이동	
if ($vResult === false) {
    echo mysqli_error($conn);
} else {
    header('Location: ../../admin/grade/grade.php');
}

$conn->close();
