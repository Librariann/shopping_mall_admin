<?php

session_start();
/**	
 * 	
 * 메뉴리스트 입력 db	
 * 	
 * @file : category_insert_db.php	
 * @author : ParkSeongHyun	
 * @since : 2020-09-29	
 * @desc : 	
 * 	
 */
require_once('../../dbconn.php');

$login_id = $_SESSION['login_id'];

//POST변수	
$category_title = $_POST['category_title']; //메뉴명	
$category_code = $_POST['category_code']; //메뉴코드	

$reg_id = $login_id;
$mod_id = $login_id;

//메뉴리스트 insert Query	
$iSql = "INSERT INTO PSM_CATEGORY(category_title, reg_id, mod_id)";
$iSql .= " VALUES('$category_title','$reg_id','$mod_id')";
$result = mysqli_query($conn, $iSql);
echo $iSql;
if ($result === false) {
    echo mysqli_error($conn);
} else {
    echo "DB_insert_success";
    echo "<br />";
    echo "5초뒤 메인페이지로 이동합니다.";
    header('Location: ../../admin/category_setting/category.php');
}

$conn->close();
