<?php	
    /**	
     * 	
     * 상품 삭제 DB 페이지	
     * 	
     * @file : product_update_db.php	
     * @author : ParkSeongHyun	
     * @since : 2020-09-26	
     * @desc : 상품삭제 DB 페이지	
     * 	
     */	

    //DB연결	
    include '../../dbconn.php';	

    $product_idx = $_REQUEST['idx'];	

    //해당 상품 삭제 query	
    $vSql = "DELETE FROM PSM_PRODUCT";	
    $vSql .= " WHERE idx='$product_idx'";	
    $vResult = mysqli_query($conn, $vSql);	

    //TODO: DELETE로 데이터 직접 삭제가 아닌 is_display의 컬럼 상태를 0으로 UPDATE 되도록 컬럼 수정	
