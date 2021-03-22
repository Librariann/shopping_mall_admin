<?php
session_start();
/**
 * 
 * 서브배너 등록 리스트
 * 
 * @file : sub_banner.php
 * @author : ParkSeongHyun
 * @since : 2021-03-23
 * @desc : 서브배너 등록 리스트
 * 
 */

include "../../dbconn.php";

$mSql = "SELECT * FROM PSM_SUBBANNER";
$mSql .= " WHERE is_display='1'";
$mSql .= " ORDER BY reg_date DESC";
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

    <title>서브배너 등록</title>

    <? include "../inc/inc_css.php"; ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- 왼쪽 사이드바 include -->
        <? include "../sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <? include "../inc/top_navbar.php"; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid css_add">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">서브배너 테이블</h1>
                    <p class="mb-4">서브배너 데이터 테이블 / <a target="_blank" href="https://datatables.net">서브배너등록</a></p>


                    <a href="#" class="btn btn-secondary btn-icon-split" style="margin-bottom:20px" data-toggle="modal" data-target="#subbanner_insert">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">서브배너 등록</span>
                    </a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">서브배너 리스트</h6>
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
                                            <td><?= $maRow['file_origin_name'] ?></td>
                                            <td style="text-align:center">
                                                <a href="#" class="btn btn-info btn-circle" data-toggle="modal" data-target="#subbanner_update<?= $maRow['idx'] ?>">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                            <td style="text-align:center">
                                                <a href="../../databases/file_upload/delete_subbanner_img.php?file_id=<?= $maRow['file_id'] ?>" class="btn btn-danger btn-circle">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <!--미리보기 창-->
                                        <div class="modal fade" id="subbanner_update<?= $maRow['idx'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">서브배너 미리보기 창</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <img src="../../databases/file_upload/subbanner/<?= $maRow['file_save_name'] ?>" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">확인</button>
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
    <div class="modal fade" id="subbanner_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">서브배너 등록창</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="imgForm" action="../../databases/file_upload/upload_subbanner_img.php" method="POST" enctype="multipart/form-data">
                        <div class="imgPreview">
                        </div>
                        <input type="file" name="file" id="image" accept="image/*" onchange="setThumbnail(event);" />
                        <input type="hidden" name="file_id" id="" value="<?= $file_attach_id ?>">
                        <input type="hidden" name="idx" value="<?= $pRow['idx'] ?>" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">취소</button>
                    <a class="btn btn-primary" href="#" onclick="subBannerSubmit()">등록</a>
                </div>

            </div>
        </div>
    </div>

    <? include "../inc/inc_js.php"; ?>

    <script>
        function subBannerSubmit() {
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