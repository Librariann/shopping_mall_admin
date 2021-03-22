<?
/**
 * 
 * 메인배너 이미지 업로드
 * 
 * @file : upload_mainbanner_img.php
 * @author : ParkSeongHyun
 * @since : 2021-02-24
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

include "../../dbconn.php";
include "../../admin/function/function.php";

if(isset($_FILES['file']) && $_FILES['file']['name'] != "") {

    $file = $_FILES['file'];
    $upload_directory = 'subbanner/';
    $ext_str = "jpg,jpeg,gif,png";
    $allowed_extensions = explode(',', $ext_str);

    //업로드 최대 파일 사이즈
    $max_file_size = 5242880;

    $ext = substr($file['name'], strrpos($file['name'], '.') + 1);

    // 확장자 체크
    if(!in_array($ext, $allowed_extensions)) 
    {
        echo "업로드할 수 없는 확장자 입니다.";
    }

    // 파일 크기 체크
    if($file['size'] >= $max_file_size) 
    {
        echo "5MB 까지만 업로드 가능합니다.";
    }

    //저장경로 암호화
    $path = md5(microtime()) . '.' . $ext;

    //서버로 전송된 파일이 있을 때
    if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) 
    {
        $file_id = uuid();
        $file_origin_name = $file['name'];
        $file_save_name = $path;
        $login_id = $_SESSION['login_id'];

        //파일 업로드 insert query
        $query = "INSERT INTO PSM_UPLOAD_FILE (file_id, file_origin_name, file_save_name, reg_id, mod_id) VALUES(?,?,?,?,?)";
        
        $stmt = mysqli_prepare($conn, $query);
        $bind = mysqli_stmt_bind_param($stmt, "sssss", $file_id, $file_origin_name, $file_save_name, $login_id, $login_id);
        $exec = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        $banner_insert = "INSERT INTO PSM_SUBBANNER (file_id, reg_id, mod_id) VALUES (?,?,?)";

        $bannerStmt = mysqli_prepare($conn, $banner_insert);
        $bannerBind = mysqli_stmt_bind_param($bannerStmt, "sss", $file_id, $login_id, $login_id);
        $bannerExec = mysqli_stmt_execute($bannerStmt);

        mysqli_stmt_close($bannerStmt);

        echo"<h3>파일 업로드 성공</h3>";
        echo '<a href="file_list.php">업로드 파일 목록</a>';
    }
} 
else 
{
    echo "<h3>파일이 업로드 되지 않았습니다.</h3>";
    echo '<a href="javascript:history.go(-1);">이전 페이지</a>';
}

mysqli_close($conn);
?>