<?php	
    /**	
     * 	
     * 로그아웃 페이지	
     * 	
     * @file : logout_db.php	
     * @author : ParkSeongHyun	
     * @since : 2020-09-23	
     * @desc : 로그아웃 페이지	
     * 	
     */	
    session_start(); 	
    session_unset();   // 모든 세션 변수의 등록 해지	
    session_destroy(); // 세션 아이디의 삭제	
    header("Location: http://localhost/shopping_mall/admin/");
