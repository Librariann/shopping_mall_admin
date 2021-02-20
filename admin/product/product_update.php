<?php

/**
 * 
 * 상품수정 페이지
 * 
 * @file : product_update.php
 * @author : ParkSeongHyun
 * @since : 2020-09-26
 * @desc : 상품수정을 위한 페이지
 * 
 */

$product_idx = $_REQUEST['idx'];

include "../../dbconn.php";

//상품 정보 불러오는 query
$pSql = "SELECT * FROM PSM_PRODUCT";
$pSql .= " WHERE idx='$product_idx'";
$pSql .= " AND is_display='1'";
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
  <link href="../css/public.css" rel="stylesheet">

  <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
  <script>
    function product_update_db() {
      const productUpdate = document.querySelector(".product_update");
      const productCheckBox = productUpdate.product_discount_YN;
      if (productCheckBox.checked === true) {
        productCheckBox.value = "Y";
      }


      productUpdate.submit();
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
                <h1 class="h4 text-gray-900 mb-4">Modify an Product!</h1>
              </div>

              <!--data form-->
              <form id="product_update" class="product_update" name="product_update" action="../../databases/product/product_update_db.php" method="POST">
                <div class="form-group">
                  상품명 : <input type="text" class="form-control form-control-user" id="product_title" name="product_title" placeholder="상품명을 입력해주세요" value="<?= $pRow['product_title'] ?>">
                </div>
                <div class="form-group">
                  상품가격 : <input type="text" class="form-control form-control-user" id="product_price" name="product_price" placeholder="상품가격을 입력해주세요" value="<?= $pRow['product_price'] ?>">
                </div>
                <div class="form-group">
                  옷 <input type="radio" class="" name="product_kinds" placeholder="상품가격을 입력해주세요" value="kinds01" <?if($pRow['product_kinds']=="kinds01" ){?>checked
                  <?}?>>
                  신발 <input type="radio" class="" name="product_kinds" placeholder="상품가격을 입력해주세요" value="kinds02" <?if($pRow['product_kinds']=="kinds02" ){?>checked
                  <?}?>>
                  악세사리 <input type="radio" class="" name="product_kinds" placeholder="상품가격을 입력해주세요" value="kinds03" <?if($pRow['product_kinds']=="kinds03" ){?>checked
                  <?}?>>
                </div>
                <div class="form-group">
                  전시여부 : <input type="text" class="form-control form-control-user" id="is_display" name="is_display" placeholder="전시여부" value="<?= $pRow['is_display'] ?>">
                </div>
                <div class="form-group">
                  할인여부 :
                  <div class="checkBtn">
                    <input type="checkbox" name="product_discount_YN" id="chk1" <?if($pRow['product_discount_YN']=="Y" ){?>checked
                    <?}?>>
                    <label for="chk1">
                      <span>선택</span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  할인가격 : <input type="text" class="form-control form-control-user" id="product_discount_price" name="product_discount_price" placeholder="할인가격을 입력해주세요" value="<?= $pRow['product_discount_price'] ?>">
                </div>

                <input type="hidden" name="idx" value="<?= $pRow['idx'] ?>" />

                <div class="btn btn-primary btn-user btn-block" onclick="product_update_db()">
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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>