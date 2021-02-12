<?php

/**
 * 
 * 상품등록 페이지
 * 
 * @file : product_insert.php
 * @author : ParkSeongHyun
 * @since : 2020-09-24
 * @desc : 상품등록을 위한 페이지
 * 
 */
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
      
      function product_insert_db()
      {
            var product_insert = document.product_insert;
            var product_title = product_insert.product_title.value;
            var product_price = product_insert.product_price.value;
            var product_kinds = product_insert.product_kinds.value;
        product_insert.submit();
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
                <h1 class="h4 text-gray-900 mb-4">Create an Product!</h1>
              </div>

              <!--data form-->
              <form id="product_insert" class="product_insert" name="product_insert" action="../../databases/product/product_insert_db.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="product_title"" name="product_title"" placeholder="상품명을 입력해주세요">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="product_price"" name="product_price"" placeholder="상품가격을 입력해주세요">
                </div>
                <div class="form-group">
                    옷 <input type="radio" name="product_kinds" value="kinds01" />
                    신발 <input type="radio" name="product_kinds" value="kinds02" />
                    악세사리 <input type="radio" name="product_kinds" value="kinds03" />
                </div>
                
                <div class="btn btn-primary btn-user btn-block" onclick="product_insert_db()">
                상품등록
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