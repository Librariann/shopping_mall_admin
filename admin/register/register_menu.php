<?php

/**
 * 
 * 유저정보 리스트
 * 
 * @file : register_menu.php
 * @author : ParkSeongHyun
 * @since : 2020-09-27
 * @desc : 유저정보 리스트
 * 
 */

session_start();

include "../../dbconn.php";

//상품정보 불러오는 query
$pSql = "SELECT * FROM PSM_USER";
$pSql .= " WHERE is_display='1'";
$pResult = mysqli_query($conn, $pSql);



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php
    //왼쪽 사이드바 include
    include "../sidebar.php";
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
        include "../top_navbar.php";
        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">유저 테이블</h1>
          <p class="mb-4">유저 데이터 테이블 / <a target="_blank" href="https://datatables.net">유저등록</a></p>


          <a href="http://localhost/shopping_mall_admin/admin/register/register.php" class="btn btn-secondary btn-icon-split" style="margin-bottom:20px">
            <span class="icon text-white-50">
              <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">유저 등록</span>
          </a>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">유저 리스트</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>회원명</th>
                      <th>등급</th>
                      <th>전화번호</th>
                      <th>주소</th>
                      <th>상세주소</th>
                      <th>이메일</th>
                      <th>등록일</th>
                      <th>수정</th>
                      <th>삭제</th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php
                    while ($pRow = mysqli_fetch_array($pResult)) {

                    ?>
                      <tr>
                        <td><?= $pRow['user_name'] ?></td>
                        <td><?= $pRow['user_grade'] ?> 원 </td>
                        <td><?= $pRow['user_phone'] ?></td>
                        <td><?= $pRow['user_post'] ?></td>
                        <td><?= $pRow['user_post2'] ?></td>
                        <td><?= $pRow['user_email'] ?></td>
                        <td><?= $pRow['reg_date'] ?></td>
                        <td style="text-align:center">
                          <a href="http://localhost/shopping_mall_admin/admin/register/register_update.php?idx=<?= $pRow['idx'] ?>" class="btn btn-info btn-circle">
                            <i class="fas fa-info-circle"></i>
                          </a>
                        </td>
                        <td style="text-align:center">
                          <a href="../databases/register/register_delete_db.php?idx=<?= $pRow['idx'] ?>" class="btn btn-danger btn-circle">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php mysqli_close($conn); ?>