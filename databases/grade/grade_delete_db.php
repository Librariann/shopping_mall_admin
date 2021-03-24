<?php
session_start();
/**	
 * 	
 * 등급 삭제 DB 페이지	
 * 	
 * @file : grade_delete_db.php	
 * @author : ParkSeongHyun	
 * @since : 2021-03-25
 * @desc : 등급 삭제 DB 페이지	
 * 	
 */


include '../../dbconn.php';

$grade_idx = $_GET['idx']; //등급 고유index
$is_display = 0; //사용유무	
$login_id = $_SESSION['login_id'];
$today = date("Y-m-d H:i:s");

$vSql = "UPDATE PSM_USER_GRADE";
$vSql .= " SET";
$vSql .= " is_display='$is_display', mod_date='$today', mod_id='$login_id'";
$vSql .= " WHERE idx=$grade_idx";
$vResult = mysqli_query($conn, $vSql);

//실패시 에러 충력 성공시 메뉴 리스트로 이동	
if ($vResult === false) {
    echo mysqli_error($conn);
} else {
    header('Location: ../../admin/grade/grade.php');
}

$conn->close();
