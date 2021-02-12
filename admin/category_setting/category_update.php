<?php

/**
 * 
 * 메뉴리스ㅡㅌ 수정 페이지
 * 
 * @file : category_update.php
 * @author : ParkSeongHyun
 * @since : 2020-09-29
 * @desc : 메뉴리스트 수정을 위한 페이지
 * 
 */

//메뉴 리스트 고유 index값
$category_idx = $_REQUEST['idx'];

include "../../dbconn.php";

//상품 정보 불러오는 query
$pSql = "SELECT * FROM PSM_CATEGORY";
$pSql .= " WHERE idx='$category_idx'";
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

  <title>상품등록 페이지</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
  <script>
      
      function category_update_db()
      {
            var category_update = document.category_update;
            
            
        category_update.submit();
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
                <h1 class="h4 text-gray-900 mb-4">Modify Menu List!</h1>
              </div>

              <!--data form-->
              <form id="category_update" class="category_update" name="category_update" action="../../databases/category/category_update_db.php" method="POST">
                <div class="form-group">
                    메뉴명 : <input type="text" class="form-control form-control-user" id="category_title" name="category_title" placeholder="메뉴명을 입력해주세요" value="<?=$pRow['category_title']?>">
                </div>
                <div class="form-group">
                사용유무 - 사용 : <input type="radio" id="" name="is_display_YN" value="Y" <?if($pRow['is_display_YN'] == "Y"){?>checked<?}?>/>, 
                미사용 : <input type="radio" id="" name="is_display_YN" value="N" <?if($pRow['is_display_YN'] == "N"){?>checked<?}?>/>
                </div>
                

                <input type="hidden" name="idx" value="<?=$pRow['idx']?>" />
                
                <div class="btn btn-primary btn-user btn-block" onclick="category_update_db()">
                상품수정
                </div>
              </form>
             
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>