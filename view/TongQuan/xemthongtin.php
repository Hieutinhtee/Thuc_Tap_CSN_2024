<?php include('../menu.php'); ?>

<div class="container-fluid">

  <div class="card" style="width: 100%; height: 100%">
    <div class="card-header d-flex">

      <!-- <div class="m-3 float-end">
        <a href="dsnhanvien.php" class="btn btn-outline-danger m-1">Quay lại</a>
      </div> -->

      <div class=" p-2">
        <h5>Xem thông tin cá nhân </h5>
      </div>


    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
          <img src="../image/profile.jpg" alt="lỗi" style="width: 100%;" class="img-fluid">
        </div>
        <?php
        require_once '../connect.php';
        $id = $_GET['xid'];
        $sql = "SELECT * FROM NHANVIEN WHERE MANV = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC); ?>

        <!-- Cột bên trái -->
        <div class="col-md-5">
          <div class="d-flex mb-3">
            <label class="form-label">Mã nhân viên: </label>
            <div class="text-primary ms-2"><?php echo $r['MANV']; ?> </div>
          </div>
          <div class="d-flex mb-3">
            <label class="form-label">Tên nhân viên:</label>
            <div class="text-primary ms-2"><?php echo $r['TENNV']; ?></div>
          </div>

          <div class="d-flex mb-3">
            <label class="form-label">Giới tính:</label>
            <div class="text-primary ms-2"><?php echo $r['GIOITINH']; ?></div>
          </div>
          <div class="d-flex mb-3">
            <label class="form-label">Ngày sinh:</label>
            <div class="text-primary ms-2"><?php echo $r['NGAYSINH']; ?></div>
          </div>
          <div class="d-flex mb-3">
            <label class="form-label">Địa chỉ:</label>
            <div class="text-primary ms-2"><?php echo $r['DIACHI']; ?></div>
          </div>

          <div class="d-flex mb-3">
            <label class="form-label">Số CMND:</label>
            <div class="text-primary ms-2"><?php echo $r['CMND']; ?></div>
          </div>
          <div class="d-flex mb-3">
            <label class="form-label">Số điện thoại:</label>
            <div class="text-primary ms-2"><?php echo $r['SDT']; ?></div>
          </div>
          <div class="d-flex mb-3">
            <label class="form-label">Email:</label>
            <div class="text-primary ms-2"><?php echo $r['EMAIL']; ?></div>
          </div>

        </div>

        <!-- Cột bên phải -->
        <div class="col-md-5 overflow-auto">
          <div class="d-flex mb-3">
            <label class="form-label">Ngày vào làm:</label>
            <div class="text-primary ms-2"><?php echo $r['NGAYVAOLAM']; ?></div>
          </div>
          <div class="d-flex mb-3">
            <label class="form-label">Bằng cấp:</label>
            <div class="text-primary ms-2"><?php echo $r['BANGCAP']; ?></div>
          </div>
          <div class="d-flex mb-3">
            <label class="form-label">Phòng ban:</label>
            <div class="text-primary ms-2"><?php echo $r['MAPHONGBAN']; ?></div>
          </div>
          <div class="d-flex mb-3">
            <label class="form-label">Chức vụ:</label>
            <div class="text-primary ms-2"><?php echo $r['CHUCVU']; ?></div>
          </div>
          <div class="d-flex mb-3">
            <label class="form-label">Quyền hạn:</label>
            <div class="text-primary ms-2"><?php echo $r['QUYENHAN']; ?></div>
          </div>
          <div class="d-flex mb-3">
            <label class="form-label">Mã hợp đồng:</label>
            <div class="text-primary ms-2">HH765349CZ3</div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="m-3 justify-content-end">
    <a href="dsnhanvien.php" class="btn btn-danger m-1">Quay lại</a>
  </div>

</div>
<?php include('../footer.php'); ?>