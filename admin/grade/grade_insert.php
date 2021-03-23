<?php
session_start();
/**
 * 
 * 등급 리스트
 * 
 * @file  grade_insert.php
 * @author  ParkSeongHyun
 * @since  2021-03-24
 * @desc  등급 등록 페이지
 * 
 */

include "../../dbconn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>등급 등록페이지</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



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
                <h1 class="h4 text-gray-900 mb-4">Create an grade!</h1>
              </div>

              <!--data form-->
              <form id="grade_insert" class="grade_insert" name="grade_insert" action="../../databases/grade/grade_insert_db.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="grade_title" name="grade_title" placeholder="등급명을 입력해주세요">
                  <input type="text" class="form-control form-control-user" id="grade_no" name="grade_no" placeholder="등급순위를 입력해주세요">
                </div>
                <!-- <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="grade_code" name="grade_code" placeholder="메뉴코드를 입력해주세요">
                </div> -->


                <div class="btn btn-primary btn-user btn-block" onclick="grade_insert_db()">
                  상품등록
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script>
    function grade_insert_db() {
      document.grade_insert.submit();
    }
  </script>
  <? include "../inc/inc_js.php" ?>

</body>

</html>
<?php mysqli_close($conn); ?>