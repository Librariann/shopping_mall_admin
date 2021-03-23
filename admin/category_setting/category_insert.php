<?php

/**
 * 
 * 메뉴등록 페이지
 * 
 * @file : category_insert.php
 * @author : ParkSeongHyun
 * @since : 2020-09-28
 * @desc : 메뉴등록을 위한 페이지
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
    function category_insert_db() {
      var category_insert = document.category_insert;
      var category_title = category_insert.category_title.value; //메뉴타이틀

      //validation check
      if (category_title == "") {
        alert("메뉴명을 입력해주세요");
        return
      } else {
        category_insert.submit();
      }

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
                <h1 class="h4 text-gray-900 mb-4">Create an category!</h1>
              </div>

              <!--data form-->
              <form id="category_insert" class="category_insert" name="category_insert" action="../../databases/category/category_insert_db.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="category_title" name="category_title" placeholder="메뉴명을 입력해주세요">
                </div>
                <!-- <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="category_code" name="category_code" placeholder="메뉴코드를 입력해주세요">
                </div> -->


                <div class="btn btn-primary btn-user btn-block" onclick="category_insert_db()">
                  상품등록
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