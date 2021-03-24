<?php

/**
 * 
 * 등급 수정 페이지
 * 
 * @file : grade_update.php
 * @author : ParkSeongHyun
 * @since : 2021-03-24
 * @desc :  등급 수정을 위한 페이지
 * 
 */

//등급 고유 index값
$grade_idx = $_REQUEST['idx'];

include "../../dbconn.php";

//등급정보 불러오는 query
$pSql = "SELECT * FROM PSM_USER_GRADE";
$pSql .= " WHERE idx='$grade_idx'";
$pResult = mysqli_query($conn, $pSql);
$pRow = mysqli_fetch_array($pResult);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>등급수정 페이지</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <script>
        function grade_update_db() {
            var grade_update = document.grade_update;
            grade_update.submit();
        }
    </script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Modify Grade List!</h1>
                            </div>

                            <!--data form-->
                            <form id="grade_update" class="grade_update" name="grade_update" action="../../databases/grade/grade_update_db.php" method="POST">
                                <div class="form-group">
                                    메뉴명 : <input type="text" class="form-control form-control-user" id="grade_title" name="grade_title" placeholder="등급명을 입력해주세요" value="<?= $pRow['grade_title'] ?>" />
                                </div>
                                <div class="form-group">
                                    등급번호 : <input type="text" class="form-control form-control-user" id="grade_no" name="grade_no" placeholder="등급순을 입력해주세요" value="<?= $pRow['grade_no'] ?>" />
                                </div>
                                <div class="form-group">
                                    사용유무 - 사용 : <input type="radio" id="" name="is_display" value="1" <?if($pRow['is_display']=="1" ){?>checked
                                    <?}?>/>,
                                    미사용 : <input type="radio" id="" name="is_display" value="0" <?if($pRow['is_display']=="0" ){?>checked
                                    <?}?>/>
                                </div>


                                <input type="hidden" name="idx" value="<?= $pRow['idx'] ?>" />

                                <div class="btn btn-primary btn-user btn-block" onclick="grade_update_db()">
                                    상품수정
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <? include "../inc/inc_js.php" ?>

</body>

</html>