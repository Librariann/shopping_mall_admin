<?php
session_start();
/**
 * 
 * 로그인 DB
 * 
 * @file : login_db.php
 * @desc : 로그인해서 아이디, 비밀번호 값 받아서 세션에 저장
 * @author : ParkSeongHyun
 * @since : 2020-09-13
 * 
 */
require_once('../../dbconn.php');
$login_id = $_REQUEST['login_id'];
$login_pw = $_REQUEST['login_pw'];

$lSql = "SELECT * FROM PSM_USER";
$lSql .= " WHERE user_id = '$login_id'";
$lSql .= " AND user_pw = '$login_pw'";
$lSql .= " AND is_display='1'";
$lResult = mysqli_query($conn, $lSql);
$lRow = mysqli_fetch_array($lResult);

$_SESSION['login_id'] = $lRow['user_id'];
$_SESSION['login_pw'] = $lRow['user_pw'];

if (isset($_SESSION['login_id']) && isset($_SESSION['login_pw'])) {
    echo "환영합니다. 로그인 되었습니다";
    header("Location: http://localhost/shopping_mall/admin/"); // 로그인시 메인페이지로 리다이렉트
} else {
    echo "로그인에 실패했습니다. 아이디 비밀번호를 확인해 주세요!!";
}

?>