<?php

/**
 * 
 * 회원가입 페이지
 * 
 * @file : register.php
 * @author : ParkSeongHyun
 * @since : 2020-09-02
 * @last_update : 2020-09-05
 * @desc :
 * 
 */

include "../function/function.php";



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>관리자 회원가입 페이지</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/public.css" rel="stylesheet">

  <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
  <!--파일 업로드 파일-->
  <script src="../js/file_upload.js"></script>
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
  </script>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div>

          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>

              <!--data form-->
              <form id="user_form" class="user" name="user" action="../../databases/register/register_db.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleFirstId" name="exampleFirstId" placeholder="아이디를 입력해주세요">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="exampleInputPassword" placeholder="패스워드를 입력해주세요">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="패스워드 확인">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleName" name="exampleName" placeholder="이름을 입력해주세요">
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-3">
                    <input type="text" class="form-control form-control-user" maxlength="3" id="examplePhoneNumber1" name="examplePhoneNumber1" value="010" placeholder="전화번호을 입력해주세요" readonly>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" maxlength="4" id="examplePhoneNumber2" name="examplePhoneNumber2" placeholder="전화번호 가운데">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" maxlength="4" id="examplePhoneNumber3" name="examplePhoneNumber3" placeholder="전화번호 마지막">
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
                <!-- <input type="button" class="btn btn-primary btn-icon-split btn-sm" onclick="daum_post()" value="주소입력" /> -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-3">
                    <input type="text" class="form-control form-control-user" id="examplePost" name="examplePost" placeholder="주소를 입력해주세요">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="zoneCode" name="zoneCode" placeholder="우편번호를 입력해주세요">
                  </div>
                  <div class="col-sm-12">
                    <input type=" text" class="form-control form-control-user" id="examplePost2" name="examplePost2" placeholder="상세주소를 입력해주세요">
                  </div>
                </div>

                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="exampleInputEmail" placeholder="이메일을 입력해주세요">
                </div>

                <div class="btn btn-primary btn-user btn-block" onclick="js_submit()">
                  Register Account
                </div>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
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