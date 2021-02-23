<?php

/**	
 * 	
 * 상품 수정 DB 페이지	
 * 	
 * @file : product_update_db.php	
 * @author : ParkSeongHyun	
 * @since : 2020-09-26	
 * @desc : 상품수정 DB 페이지	
 * 	
 */
session_start();

include '../../dbconn.php';

$product_idx = $_POST['idx']; //상품 고유idx	
$product_title = $_POST['product_title']; //상품명	
$product_price = $_POST['product_price']; //상품가격	
$is_display = $_POST['is_display']; //상품 전시 유무 0-미전시, 1-전시	
$product_discount_YN = $_POST['product_discount_YN']; //상품 할인유무	
if ($product_discount_YN == "") {
    $product_discount_YN = "N";
}
$product_discount_price = $_POST['product_discount_price']; //상품 할인가격	
$product_kinds = $_POST['product_kinds']; //상품 종류

$login_id = $_SESSION['login_id'];
$today = date("Y-m-d H:i:s");


$vSql = "UPDATE PSM_PRODUCT";
$vSql .= " SET";
$vSql .= " product_title='$product_title', product_price='$product_price', product_kinds='$product_kinds', is_display=$is_display, product_discount_YN='$product_discount_YN', product_discount_price='$product_discount_price', mod_date='$today', mod_id='$login_id'";
$vSql .= " WHERE idx=$product_idx";
$vResult = mysqli_query($conn, $vSql);

echo $vSql;
