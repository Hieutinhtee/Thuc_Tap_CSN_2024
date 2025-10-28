<?php include('../menu.php'); ?>
<?php
require_once '../connect.php';
$sql = $conn->query("SELECT MANV FROM NHANVIEN where MANV IS NOT NULL ");
$sonv = $sql->rowCount();
$sql1 = $conn->query("SELECT * FROM PHONGBAN where MAPHONGBAN IS NOT NULL ");
$sopb = $sql1->rowCount();
$sql2 = $conn->query("SELECT * FROM NHANVIEN where MATKHAU IS NOT NULL ");
$sotk = $sql2->rowCount();
?>
<div class="container-fluid">
  <div class="mb-3">
    <h4>Tổng quan</h4>
  </div>
  <div class="row d-flex mb-3">
    <div class="col-12 col-md-3 text-light border border-secondary rounded m-2"
      style="background-color: #1E90FF; box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.3);	">

      <div class="d-flex align-items-center justify-content-around">
        <div>
          <h1><?php echo $sonv ?></h1>
          <p>Nhân viên</p>
        </div>
        <i class="fa fa-user" aria-hidden="true" style="font-size: 60px; "></i>
      </div>
      <hr>
      <div>
        <a href="../TongQuan/dsnhanvien.php" class="text-light align-items-center">Danh sách nhân viên<i
            class="fa fa-angle-double-right ms-2" aria-hidden="true"></i></a>
      </div>
    </div>
    <div class="col-12 col-md-3 text-light border border-secondary rounded m-2"
      style="background-color: #FF8C00; box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.3);	">

      <div class="d-flex align-items-center justify-content-around">
        <div>
          <h1><?php echo $sopb ?></h1>
          <p>Phòng ban</p>
        </div>
        <i class="fa fa-building" aria-hidden="true" style="font-size: 60px; "></i>
      </div>
      <hr>
      <div>
        <a href="../QLPBan/qlphongban.php" class="text-light align-items-center">Danh sách phòng ban<i
            class="fa fa-angle-double-right ms-2" aria-hidden="true"></i></a>
      </div>
    </div>
    <div class="col-12 col-md-3 text-light border border-secondary rounded m-2"
      style="background-color: #D2691E	;box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.3);">

      <div class="d-flex align-items-center justify-content-around">
        <div>
          <h1><?php echo $sotk ?></h1>
          <p>Tài khoản người dùng</p>
        </div>
        <i class="fa fa-user" aria-hidden="true" style="font-size: 60px; "></i>
      </div>
      <hr>
      <div>
        <a href="dstaikhoan.php" class="text-light align-items-center">Danh sách tài khoản<i
            class="fa fa-angle-double-right ms-2" aria-hidden="true"></i></a>
      </div>
    </div>
    <div class="col-12 col-md-3 text-light border border-secondary rounded bg-danger m-2"
      style="box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.3);">

      <div class="d-flex align-items-center justify-content-around">
        <div>
          <h1>1</h1>
          <p>Nhân viên nghỉ việc</p>
        </div>
        <i class="fa fa-user" aria-hidden="true" style="font-size: 60px; "></i>
      </div>
      <hr>
      <div>
        <a href="link" class="text-light align-items-center">Danh sách nhân viên nghỉ việc<i
            class="fa fa-angle-double-right ms-2" aria-hidden="true"></i></a>
      </div>
    </div>
    <!-- modal xuất xlxs -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Xuất báo cáo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="xuatbaocao.php" method="post">
              <button type="submit" name="xuat_dsnv" class="btn btn-success m-1">Danh sách nhân viên</button>
              <button type="submit" name="xuat_dsluong" class="btn btn-success m-1">Danh sách lương</button>
              <button type="submit" name="xuat_dscongtac" class="btn btn-success m-1">Lịch công tác</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>

          </div>
        </div>
      </div>
    </div>
    <!-- modal xuất xlxs -->


    <div class="col-12 col-md-3 text-light border border-secondary rounded bg-success m-2"
      style="box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.3);">

      <div class="d-flex align-items-center justify-content-around">
        <div>
          <h1>EXCEL</h1>
          <p>Tổng hợp danh sách</p>
        </div>
        <i class="fa fa-file-text-o" aria-hidden="true" style="font-size: 60px; "></i>
      </div>
      <hr>
      <div>

        <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-light align-items-center">Xuất báo cáo<i
            class="fa fa-angle-double-right ms-2" aria-hidden="true"></i></a>
      </div>
    </div>



  </div>
  <!-- Table Element -->
  <div class="row">
    <div class="col-12 col-md-6 d-flex">
      <div class="card border-0">
        <div class="card-header">
          <h5 class="card-title">Danh sách phòng ban</h5>
          <div class="d-flex justify-content-between">
            <div class="entries-select">
              <label for="entriesSelect" class="form-label">Hiển thị</label>
              <select id="entriesSelect" class="form-select" style="width: auto; ">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
              <label for="entriesSelect" class="form-label">đối tượng</label>
            </div>
            <!-- <div class="form-floating" >
                      <input type="email" class="form-control" style="height: 20px;" id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">Tìm kiếm</label>
                    </div> -->
          </div>
        </div>
        <div class="card-body">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã phòng</th>
                <th scope="col">Tên phòng</th>

              </tr>
            </thead>
            <tbody>
              <?php
              require_once '../connect.php';
              $stmt = $conn->prepare("SELECT * FROM PHONGBAN");
              $stmt->execute();
              $stt = 0;

              foreach ($stmt->fetchAll() as $r) {

                ?>
                <tr>
                  <th><?php echo $stt += 1; ?></th>
                  <td><?php echo $r['MAPHONGBAN']; ?></td>
                  <td><?php echo $r['TENPHONGBAN']; ?></td>


                </tr>
                <?php
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 d-flex">
      <div class="card border-0">
        <div class="card-header">
          <h5 class="card-title">Danh sách chức vụ</h5>
          <div class="d-flex justify-content-between">
            <div class="entries-select">
              <label for="entriesSelect" class="form-label">Hiển thị</label>
              <select id="entriesSelect" class="form-select" style="width: auto; ">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
              <label for="entriesSelect" class="form-label">đối tượng</label>
            </div>
            <!-- <div class="d-flex align-items-center">
                      <p>Search: </p> <input type="search">
                    </div> -->
          </div>
        </div>
        <div class="card-body">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã chức vụ</th>
                <th scope="col">Tên chức vụ</th>

              </tr>
            </thead>
            <tbody>
              <?php
              require_once '../connect.php';
              $stmt = $conn->prepare("SELECT * FROM CHUCVU");
              $stmt->execute();
              $stt = 0;
              foreach ($stmt->fetchAll() as $r) {
                ?>
                <tr>
                  <th><?php echo $stt += 1; ?></th>
                  <td><?php echo $r['MACHUCVU']; ?></td>
                  <td><?php echo $r['TENCHUCVU']; ?></td>


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
</div>
</main>

<?php include('../footer.php'); ?>