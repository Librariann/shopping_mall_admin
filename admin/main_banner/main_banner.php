<?php
session_start();
/**
 * 
 * 메인배너 등록 리스트
 * 
 * @file : main_banner.php
 * @author : ParkSeongHyun
 * @since : 2021-02-24
 * @desc : 메인배너 등록 리스트
 * 
 */

include "../../dbconn.php";

$mSql = "SELECT * FROM PSM_MAINBANNER";
$mSql .= " WHERE is_display='1'";
$mResult = mysqli_query($conn, $mSql);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>메인배너 등록</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/main_banner.css" rel="stylesheet">


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
                <div class="container-fluid css_add">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">메인배너 테이블</h1>
                    <p class="mb-4">메인배너 데이터 테이블 / <a target="_blank" href="https://datatables.net">메인배너등록</a></p>


                    <a href="#" class="btn btn-secondary btn-icon-split" style="margin-bottom:20px" data-toggle="modal" data-target="#mainbanner_insert">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">메인배너 등록</span>
                    </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">메인배너 리스트</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>원본 파일명</th>
                                            <th>수정</th>
                                            <th>삭제</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?
                                        while ($mRow = mysqli_fetch_assoc($mResult)) {
                                            $maSql = "SELECT * FROM PSM_UPLOAD_FILE";
                                            $maSql .= " WHERE file_id='$mRow[file_id]'";
                                            $maSql .= " AND is_display='1'";
                                            $maResult = mysqli_query($conn, $maSql);
                                            $maRow = mysqli_fetch_assoc($maResult);
                                        ?>
                                        <tr>
                                            <td><?= $maRow['file_id'] ?></td>
                                            <td style="text-align:center">
                                                <a href="#" class="btn btn-info btn-circle" data-toggle="modal" data-target="#mainbanner_update<?= $maRow['idx'] ?>">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                            <td style="text-align:center">
                                                <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#mainbanner_update">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--미리보기 창-->
                                        <div class="modal fade" id="mainbanner_update<?= $maRow['idx'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">메인배너 미리보기 창</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <img src="../../databases/file_upload/mainbanner/<?= $maRow['file_save_name'] ?>" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">취소</button>
                                                        <a class="btn btn-primary" href="#" onclick="mainBannerSubmit()">등록</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <?
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
    <!--등록창-->
    <div class="modal fade" id="mainbanner_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">메인배너 등록창</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="imgForm" action="../../databases/file_upload/upload_mainbanner_img.php" method="POST" enctype="multipart/form-data">
                        <div class="imgPreview">
                        </div>
                        <input type="file" name="file" id="image" accept="image/*" onchange="setThumbnail(event);" />
                        <input type="hidden" name="file_id" id="" value="<?= $file_attach_id ?>">
                        <input type="hidden" name="idx" value="<?= $pRow['idx'] ?>" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">취소</button>
                    <a class="btn btn-primary" href="#" onclick="mainBannerSubmit()">등록</a>
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

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <script>
        function mainBannerSubmit() {
            var imgSelector = document.imgForm;
            imgSelector.submit();
            return false;
        }

        function setThumbnail(event) {

            // const unnamed = document.querySelector(".imgPreview > img");
            // unnamed.style.display = "none";

            var reader = new FileReader();
            reader.onload = function(event) {
                var img = document.createElement("img");
                img.setAttribute("src", event.target.result);
                document.querySelector(".imgPreview").appendChild(img);
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>
<?php mysqli_close($conn); ?>