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

$is_display = $_POST['is_display']; //상품 전시 유무 0-미전시, 1-전시	
$product_discount_YN = $_POST['product_discount_YN']; //상품 할인유무	
if ($product_discount_YN == "") {
    $product_discount_YN = "N";
}
$product_discount_price = $_POST['product_discount_price']; //상품 할인가격	
$product_kinds = $_POST['product_kinds']; //상품 종류

$login_id = $_SESSION['login_id'];

//상품 입력 query	
$vSql = "INSERT INTO PSM_PRODUCT";
$vSql .= "(product_title, product_price, product_kinds, reg_id, mod_id)";
$vSql .= " VALUES";
$vSql .= " ('$product_title', '$product_price', '$product_kinds', '$login_id', '$login_id')";
$vResult = mysqli_query($conn, $vSql);
