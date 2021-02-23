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
$exampleFirstId = $_POST['exampleFirstId']; //아이디	
$exampleInputPassword = $_POST['exampleInputPassword']; //패스워드	
$exampleName = $_POST['exampleName']; //이름	
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

$iSql = "INSERT INTO PSM_USER(user_id, user_pw, user_name, user_phone, user_post, user_post2, user_zonecode, user_email, reg_id, mod_id)";	
$iSql .= " VALUES('$exampleFirstId','$exampleInputPassword','$exampleName','$examplePhoneNumberFull','$examplePost','$examplePost2','$zoneCode','$exampleInputEmail','$reg_id','$mod_id')";	
$result = mysqli_query($conn, $iSql);	
if ($result === false) {	
    echo mysqli_error($conn);	
} else {	
    echo "DB_insert_success";	
    echo "<br />";	
    echo "5초뒤 메인페이지로 이동합니다.";	
    sleep(5);	
    header('Location: ../../admin/index.php/');	
}	

$conn->close();
