<?php
session_start();
/**
 * 
 * 등급 리스트
 * 
 * @file  grade.php
 * @author  ParkSeongHyun
 * @since  2021-03-23
 * @desc  등급 리스트 페이지
 * 
 */

include "../../dbconn.php";

//상품정보 불러오는 query
$pSql = "SELECT * FROM PSM_USER_GRADE";
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

    <title>등급 리스트</title>

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
                include "../inc/top_navbar.php";
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">등급 리스트</h1>
                    <p class="mb-4">등급 데이터 테이블 / <a target="_blank" href="https://datatables.net">등급 등록</a></p>


                    <a href="./grade_insert.php" class="btn btn-secondary btn-icon-split" style="margin-bottom:20px">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">등급 등록</span>
                    </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">등급 리스트</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>등급명</th>
                                            <th>사용여부</th>
                                            <th>수정</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        while ($pRow = mysqli_fetch_array($pResult)) {
                                        ?>
                                            <tr>
                                                <td><?= $pRow['grade_title'] ?></td>
                                                <td>
                                                    <? 
                                                    if($pRow['is_display'] == 1){
                                                        echo "사용";
                                                    } else {
                                                        echo "미사용";
                                                    }
                                                ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <a href="/shopping_mall_admin/admin/grade/grade_update.php?idx=<?= $pRow['idx'] ?>" class="btn btn-info btn-circle">
                                                        <i class="fas fa-info-circle"></i>
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

    <? include "../inc/inc_js.php" ?>

</body>

</html>
<?php mysqli_close($conn); ?>