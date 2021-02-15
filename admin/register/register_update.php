<?php

/**
 * 
 * 회원정보 수정 페이지
 * 
 * @file : register_update.php
 * @author : ParkSeongHyun
 * @since : 2020-09-27
 * @desc : 회원수정을 위한 페이지
 * 
 */

$user_idx = $_REQUEST['idx'];

include "../../dbconn.php";
include "../function/function.php";

//유저 정보 불러오는 query
$pSql = "SELECT * FROM PSM_USER";
$pSql .= " WHERE idx='$user_idx'";
$pSql .= " AND is_display='1'";
$pResult = mysqli_query($conn, $pSql);
$pRow = mysqli_fetch_array($pResult);

//파일 고유 id 부여
if ($pRow['file_attach_id'] == "") {
  $file_attach_id = uuid();
} else {
  $file_attach_id = $pRow['file_attach_id'];
}

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
    /**
     * @name : daum_post
     * @desc : 다음 주소 API
     * @return
     */
    function daum_post() {
      new daum.Postcode({
        oncomplete: function(data) {
          $("#examplePost").val(data.address);
          $("#zoneCode").val(data.zonecode)
        }
      }).open();
    }

    function user_update_db() {
      var user_update = document.user_update;
      var user_idx = user_update.idx.value; //상품 고유 id

      user_update.submit();
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
                <h1 class="h4 text-gray-900 mb-4">Modify User infomartion!</h1>
              </div>

              <!--data form-->
              <form id="user_update" class="user_update" name="user_update" action="../../databases/register/register_update_db.php" method="POST">
                <input type="hidden" name="idx" value="<?= $pRow['idx'] ?>">
                <div class="form-group">
                  회원아이디 : <input type="text" class="form-control form-control-user" id="exampleFirstId" name="exampleFirstId" value="<?= $pRow['user_id'] ?>" readonly>
                </div>
                <div class="form-group">
                  회원명 : <input type="text" class="form-control form-control-user" id="exampleName" name="exampleName" placeholder="회원명을 입력해주세요" value="<?= $pRow['user_name'] ?>">
                </div>
                <div class="form-group">
                  <!--TODO: 2020-10-05 select option DB값에 맞는 option 자동 select 되게 작업 예정-->
                  회원등급 : <select class="form-control form-control-user" id="user_grade" name="user_grade">
                    <option value="1" <?if($pRow['user_grade']==1){?>selected
                      <?}?>>운영자</option>
                    <option value="2" <?if($pRow['user_grade']==2){?>selected
                      <?}?>>부운영자</option>
                    <option value="3" <?if($pRow['user_grade']==3){?>selected
                      <?}?>>사원</option>
                    <option value="4" <?if($pRow['user_grade']==4){?>selected
                      <?}?>>고객</option>
                    <option value="5" <?if($pRow['user_grade']==5){?>selected
                      <?}?>>우수고객</option>
                  </select>
                </div>
                <div class="form-group" style="margin:0">
                  <?
                      $phoneNumber = explode("-",$pRow['user_phone']);
                    ?>
                  전화번호 :
                  <div class="form-group row" style="margin:0">
                    <div class="col-sm-4 mb-3 mb-sm-3">
                      <input type="text" class="form-control form-control-user" maxlength="3" id="examplePhoneNumber1" name="examplePhoneNumber1" value="010" placeholder="전화번호을 입력해주세요" readonly>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-user" maxlength="4" id="examplePhoneNumber2" name="examplePhoneNumber2" placeholder="전화번호 가운데" value="<?= $phoneNumber[1] ?>">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-user" maxlength="4" id="examplePhoneNumber3" name="examplePhoneNumber3" placeholder="전화번호 마지막" value="<?= $phoneNumber[2] ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <a href="#" class="btn btn-primary btn-icon-split btn-sm" onclick="daum_post()">
                    <span class="icon text-white-50">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">
                      주소입력
                    </span>
                  </a>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-3">
                    <input type="text" class="form-control form-control-user" id="examplePost" name="examplePost" placeholder="주소를 입력해주세요" value="<?= $pRow['user_post'] ?>">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="zoneCode" name="zoneCode" placeholder="우편번호를 입력해주세요" value="<?= $pRow['user_zonecode'] ?>">
                  </div>
                  <div class="col-sm-12">
                    <input type=" text" class="form-control form-control-user" id="examplePost2" name="examplePost2" placeholder="상세주소를 입력해주세요" value="<?= $pRow['user_post2'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  이메일 : <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="exampleInputEmail" value="<?= $pRow['user_email'] ?>">
                </div>


                <input type="hidden" name="idx" value="<?= $pRow['idx'] ?>" />
                <input type="hidden" name="file_attach_id" value="<?= $file_attach_id ?>" />

                <div class="btn btn-primary btn-user btn-block" onclick="user_update_db()">
                  유저정보 수정
                </div>
              </form>

            </div>
          </div>
          <div class="col-lg-5 d-none d-lg-block">
            <img src="" alt="유저 이미지">
            <form action="../../databases/file_upload/upload_process.php" method="POST">
              <input type="submit" value="이미지 등록">
            </form>

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