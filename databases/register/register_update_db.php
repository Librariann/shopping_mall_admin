<?php

/**
 * 
 * 회원가입 입력 페이지
 * 
 * @file : register_insert_db.php
 * @desc : 
 * @author : ParkSeongHyun
 * @since : 2020-09-09
 */
require_once('../../dbconn.php');

//POST변수
$exampleIdx = $_POST['idx']; //고유 index값
$exampleName = $_POST['exampleName']; //이름
$exampleGrade = $_POST['user_grade']; //등급
$examplePhoneNumber1 = $_POST['examplePhoneNumber1']; //폰 첫번째
$examplePhoneNumber2 = $_POST['examplePhoneNumber2']; //폰 가운데
$examplePhoneNumber3 = $_POST['examplePhoneNumber3']; //폰 마지막
$examplePhoneNumberFull = $examplePhoneNumber1 . "-" . $examplePhoneNumber2 . "-" . $examplePhoneNumber3;
$examplePost = $_POST['examplePost']; //주소
$zoneCode = $_POST['zoneCode']; //우편번호
$examplePost2 = $_POST['examplePost2']; //상세주소
$exampleInputEmail = $_POST['exampleInputEmail']; //이메일
$reg_id = "admin";
$mod_id = "admin";

$uSql = "UPDATE PSM_USER SET user_name='$exampleName', user_grade='$exampleGrade', user_phone='$examplePhoneNumberFull', user_post='$examplePost', user_post2='$examplePost2', user_zonecode='$zoneCode', user_email='$exampleInputEmail', mod_id='$mod_id'";
$uSql .= " WHERE idx=$exampleIdx";
$result = mysqli_query($conn, $uSql);
if ($result === false) {
    echo mysqli_error($conn);
} else {
    header('Location: http://localhost/shopping_mall/admin/register/register_menu.php');
}

$conn->close();
?>