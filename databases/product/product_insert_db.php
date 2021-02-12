<?php

    /**
     * 
     * 상품 입력 DB 페이지
     * 
     * @file : product_insert_db.php
     * @author : ParkSeongHyun
     * @since : 2020-09-26
     * @desc : 상품입력 DB 페이지
     * 
     */

    session_start();

    //DB연결
    include '../../dbconn.php';

    $product_title = $_POST['product_title']; //상품명
    $product_price = $_POST['product_price']; //상품가격
    $product_kinds = $_POST['product_kinds']; //상품종류

    $login_id = $_SESSION['login_id'];

    //상품 입력 query
    $vSql = "INSERT INTO PSM_PRODUCT";
    $vSql .= "(product_title, product_price, product_kinds, reg_id, mod_id)";
    $vSql .= " VALUES";
    $vSql .= " ('$product_title', '$product_price', '$product_kinds', '$login_id', '$login_id')";
    $vResult = mysqli_query($conn, $vSql);
?>

