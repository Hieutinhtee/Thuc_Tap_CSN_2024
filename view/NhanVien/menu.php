<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<?php
session_start();
if (!isset($_SESSION["dangnhap"]) or $_SESSION["dangnhap"] != 0) {
  header("location:../DNDK");
}
$_SESSION["dangnhap"] = 0;

    $id = $_SESSION['manv'];
    $tennv = $_SESSION['tennv'];

?>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Công ty HHHH</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../js/script.js?1"></script>
  <!-- Stylesheet -->
  <link rel="stylesheet" href="../table/action-table.css">
  <!-- Core JavaScript -->
  <script type="module" src="../table/action-table.js"></script>
  <!-- Enable filter menus and switches -->
  <script type="module" src="../table/action-table-filters.js"></script>
  <!-- Enable toggle switches -->
  <script type="module" src="../table/action-table-switch.js"></script>
  <!-- Enable pagination controls -->
  <script type="module" src="../table/action-table-pagination.js"></script>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/index.css" />
  <link rel="stylesheet" href="../css/toast.css" />
</head>

<div class="toast1">
  <div class="toast1-content">
    <i class="fa fa-solid fa-check check"></i>

    <div class="message">
      <span class="text text-1">Thành công</span>
      <span class="text text-2">Thực hiện thao tác thành công</span>
    </div>
  </div>
  <i class="fa-solid fa-xmark close"></i>

  <div class="progress"></div>
</div>
<div class="wrapper">
  <aside id="sidebar" style="background: #2d5470;" class="js-sidebar">
    <!-- Sidebar Content -->
    <div class="h-100">
      <div class="sidebar-logo">
        <a href="index.php"><img src="../image/logoHHH.jpg" alt="Lối"
            style="height: 50px; width: 50px; border-radius: 10px" /></a>
        <div>
          <p><b><?php echo $_SESSION['tennv'] ?></b></p>
          <p>Nhân viên</p>
        </div>
      </div>
      <ul class="sidebar-nav">
        <li class="sidebar-header">Tùy chọn</li>
        
        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed" data-bs-target="#congtac" data-bs-toggle="collapse"
            aria-expanded="false"><i class="fa-solid fa-calendar-days pe-2"></i>
            Quản lý công tác
          </a>
          <ul id="congtac" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="lichcongtac.php" class="sidebar-link">
                <i class="fa-regular fa-circle me-2"></i>Lịch công tác</a>
            </li>
            <li class="sidebar-item">
              <a href="dsnghiphep.php" class="sidebar-link">
                <i class="fa-regular fa-circle me-2"></i>Danh sách đơn nghỉ phép</a>
            </li>
            <li class="sidebar-item">
              <a href="taonghiphep.php" class="sidebar-link">
                <i class="fa-regular fa-circle me-2"></i>Tạo đơn nghỉ phép</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a href="bangluong.php" class="sidebar-link collapsed">
            <i class="fa-solid fa-building pe-2"></i>Bảng lương</a>
        </li>
        
        

        <li class="sidebar-header">Quản lý tài khoản</li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse"
            aria-expanded="false"><i class="fa-solid fa-user-lock pe-2"></i>
            Tài khoản
          </a>
          <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
          <li class="sidebar-item">
              <a href="thongtin.php" class="sidebar-link">
                <i class="fa-regular fa-circle me-2"></i>Thông tin cá nhân</a>
            </li>
            <li class="sidebar-item">
              <a href="doimatkhau.php" class="sidebar-link">
                <i class="fa-regular fa-circle me-2"></i>Đổi mật khẩu</a>
            </li>
            <li class="sidebar-item">
              <a href="../logout.php" class="sidebar-link">
                <i class="fa-regular fa-circle me-2"></i>Đăng xuất</a>
            </li>
          </ul>
        </li>
      </ul>

    </div>
  </aside>
  <!-- Main Content -->
  <div class="main">
    <nav class="navbar navbar-expand px-3 border-bottom">
      <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
              <img src="../image/usernam.jpg" class="avatar img-fluid rounded" alt="" />
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a href="#" class="dropdown-item">Profile</a>
              <a href="#" class="dropdown-item">Setting</a>
              <a href="#" class="dropdown-item">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Page Content -->
    <main class="content px-3 py-2">