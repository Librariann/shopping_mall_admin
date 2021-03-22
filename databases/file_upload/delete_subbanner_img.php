<?
/**
 * 
 * 서브배너 이미지 삭제
 * 
 * @file : delete_subbanner_img.php
 * @author : ParkSeongHyun
 * @since : 2021-03-23
 * @desc : 
 * 
 */

session_start();
//로그인 ID 저장
if(isset($_SESSION['login_id']))
{
    $login_id = $_SESSION['login_id'];
}
else
{
    echo "로그인이 필요합니다.";
    exit;
}

$file_id = $_GET['file_id'];

include "../../dbconn.php";
include "../../admin/function/function.php";


 //파일 delete query
 $query = "UPDATE PSM_SUBBANNER SET is_display='0' WHERE file_id=?";
        
 $stmt = mysqli_prepare($conn, $query);
 $bind = mysqli_stmt_bind_param($stmt, "s", $file_id);
 $exec = mysqli_stmt_execute($stmt);

 echo $query;

mysqli_close($conn);

header('Location: /shopping_mall_admin/admin/sub_banner/sub_banner.php');
?>