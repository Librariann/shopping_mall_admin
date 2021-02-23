<?php

//디버깅
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
/**
 * 
 * 상단 네비게이션
 * 
 * @file : top_navbar.php
 * @author : ParkSeongHyun
 * @since : 2020-09-24
 * @desc : 상단 네비게이션 바
 */


$login_id = "";

//로그인 ID 저장
if (isset($_SESSION['login_id'])) {
  $login_id = $_SESSION['login_id'];
}



//로그인 유저 정보 불러오는 query
$vSql = "SELECT * FROM PSM_USER";
$vSql .= " WHERE user_id = '$login_id'";
$vSql .= " AND is_display='1'";
$vResult = mysqli_query($conn, $vSql);
$vRow = mysqli_fetch_array($vResult);

//로그인 유저 정보 COUNT query
$cSql = "SELECT * FROM PSM_USER";
$cSql .= " WHERE user_id = '$login_id'";
$cSql .= " AND is_display='1'";
$cResult = mysqli_query($conn, $cSql);
$cRow = mysqli_num_rows($cResult);

//유저 등록된 이미지 불러오는 query
$iSql = "SELECT * FROM PSM_UPLOAD_FILE";
$iSql .= " WHERE file_user_id='$vRow[file_user_id]'";
$iSql .= " AND is_display='1'";
$iSql .= " ORDER BY idx DESC";
$iResult = mysqli_query($conn, $iSql);
$iRow = mysqli_fetch_array($iResult);

//프로필 이미지 불러오는 count query
$icSql = "SELECT count(*) AS cnt FROM PSM_UPLOAD_FILE";
$icSql .= " WHERE file_user_id='$vRow[file_user_id]'";
$icSql .= " AND is_display='1'";
$icSql .= " ORDER BY idx DESC";
$icResult = mysqli_query($conn, $icSql);
$icRow = mysqli_fetch_array($icResult);

?>
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Search -->
  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-primary" type="button">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
      </a>
      <!-- Dropdown - Messages -->
      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <!--헤더 로그인, 로그아웃-->
    <li class="nav-item dropdown no-arrow">
      <?php
      if ($cRow == 1) {
      ?>
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">어서오세요 <?php echo $vRow['user_id']; ?> 님</span>
          <?
            if($icRow['cnt'] > 0)
            {
          ?>
          <img class="img-profile rounded-circle" src="/shopping_mall_admin/databases/file_upload/data/<?= $iRow['file_save_name'] ?>">
          <?
            }
            else
            {
          ?>
          <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
          <?
            }
          ?>

        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

          <a class="dropdown-item" href="register/register_menu.php">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            Settings
          </a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>

        </div>
      <?php
      } else {
      ?>
        <a class="nav-link dropdown-toggle" href="/shopping_mall_admin/admin/login.php">
          로그인
        </a>
      <?php
      }
      ?>
    </li>
    <li class="nav-item dropdown no-arrow" style="display:none">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Settings
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Activity Log
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>

  </ul>

</nav>
<!-- End of Topbar -->