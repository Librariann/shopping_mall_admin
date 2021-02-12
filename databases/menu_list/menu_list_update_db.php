<?php
    session_start();
    /**
     * 
     * 메뉴리스트 수정 DB 페이지
     * 
     * @file : category_update_db.php
     * @author : ParkSeongHyun
     * @since : 2020-09-29
     * @desc : 메뉴리스트 수정 DB 페이지
     * 
     */
    

    include '../../dbconn.php';

    $category_idx = $_POST['idx'];//메뉴 고유index
    $category_title = $_POST['category_title'];//메뉴명
    $is_display_YN = $_POST['is_display_YN']; //사용유무
    $login_id = $_SESSION['login_id'];
    $today = date("Y-m-d H:i:s");

    $vSql = "UPDATE PSM_CATEGORY";
    $vSql .= " SET";
    $vSql .= " category_title='$category_title', is_display_YN='$is_display_YN', mod_date='$today', mod_id='$login_id'";
    $vSql .= " WHERE idx=$category_idx";
    $vResult = mysqli_query($conn, $vSql);

    //실패시 에러 충력 성공시 메뉴 리스트로 이동
    if ($vResult === false) {
        echo mysqli_error($conn);
    } else {
        header('Location: ../../admin/category_setting/category.php/');
    }
    
    $conn->close();

?>