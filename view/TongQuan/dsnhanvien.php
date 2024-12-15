<?php include('../menu.php'); ?>
<main class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 d-flex">
        <div class="card border-0">
          <div class="card-header">
            <h5 class="card-title">Danh sách nhân viên</h5>
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

              <div class="d-flex align-items-center">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal"><i
                    class="fa fa-plus" aria-hidden="true"></i>
                  Thêm nhân viên
                </button>
              </div>

              <!-- The Modal -->
              <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Thêm mới nhân viên</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <div class="container">
                        <form action="themnvform.php" method="post" class="row g-3 needs-validation" novalidate>
                          <div>
                            <label for="validationCustom01" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="tennv" required>

                          </div>
                          <div>
                            <label for="validationCustom01" class="form-label">Số CMND</label>
                            <input type="text" class="form-control" name="cmnd" required>
                          </div>

                          <div>
                            <label for="validationCustom04" class="form-label">Giới tính</label>
                            <select class="form-select" name="gioitinh" required>
                              <option selected disabled value="">Chọn giới tính...</option>
                              <option>Nam</option>
                              <option>Nữ</option>

                            </select>

                          </div>
                          <div>
                            <label for="validationCustom02" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" name="ngaysinh" required>

                          </div>
                          <div>
                            <label for="validationCustom01" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="diachi" required>

                          </div>
                          <div>
                            <label for="validationCustom01" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt" required>

                          </div>
                          <div>
                            <label for="validationCustom01" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" required>

                          </div>
                          <div>
                            <label for="validationCustom02" class="form-label">Ngày vào làm</label>
                            <input type="date" class="form-control" name="ngayvaolam" required>

                          </div>
                          <div>
                            <label for="bacLuong" class="form-label">Chọn bằng cấp: </label>
                            <select class="form-control" name="bangcap" required>
                              <option selected disabled value="">Chọn bằng cấp...</option>
                              <?php
                              require_once '../connect.php';
                              $stmt = $conn->prepare("SELECT TENBANGCAP FROM BANGCAP");
                              $stmt->execute();
                              foreach ($stmt->fetchAll() as $r) {
                                ?>
                                <option><?php echo $r['TENBANGCAP']; ?></option>
                                <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div>
                            <label for="bacLuong" class="form-label">Chọn chức vụ: </label>
                            <select class="form-control" name="chucvu" required>
                              <option selected disabled value="">Chọn chức vụ...</option>
                              <?php
                              require_once '../connect.php';
                              $stmt = $conn->prepare("SELECT TENCHUCVU FROM CHUCVU");
                              $stmt->execute();

                              foreach ($stmt->fetchAll() as $r) {
                                ?>
                                <option><?php echo $r['TENCHUCVU']; ?></option>
                                <?php
                              }
                              ?>
                            </select>
                          </div>
                          <button class="btn btn-primary" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>
                            Thêm</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body flex-column">
            <action-table>
              <div>
                <action-table-filters>
                  <div class="flex flex-col">
                    <div>
                      <!-- Search Field -->
                      <div class="input-group mb-3 col-5">
                      <button class="btn btn-primary" type="button" id="button-addon1">Tìm kiếm</button>
                        <input class="form-control " aria-describedby="basic-addon1" id="action-table-search"
                          name="action-table" type="search" placeholder="Search">
                      </div>                     
                    </div>
                  </div>
                </action-table-filters>
              </div>
              <table class="table text-center table-hover">
                <thead style="top: 0; position: sticky;">
                  <tr>
                    <th>Mã nhân viên</th>
                    <th>Ảnh</th>
                    <th>Tên nhân viên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Chức vụ</th>

                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once '../connect.php';
                  $stmt = $conn->prepare("SELECT * FROM NHANVIEN");
                  $stmt->execute();

                  foreach ($stmt->fetchAll() as $r) {
                    ?>
                    <tr>
                      <td><?php echo $r['MANV']; ?> </td>
                      <td><img src="../image/profile.jpg" alt="loi"
                          style="height: 50px; width: 50px; border-radius: 10px">
                      </td>
                      <td><?php echo $r['TENNV']; ?></td>
                      <td><?php echo $r['DIACHI']; ?></td>
                      <td><?php echo $r['SDT']; ?></td>
                      <td><?php echo $r['EMAIL']; ?></td>
                      <td><?php echo $r['CHUCVU']; ?></td>

                      <td><a href="suanhanvien.php?xid=<?php echo $r['MANV']; ?>" class="btn btn-outline-primary m-1"><i class="fa fa-solid fa-pencil"
                            aria-hidden="true"></i>
                        </a>
                        <a onclick="return confirm('Xác nhận xóa');" href="xoanhanvien.php?xid=<?php echo $r['MANV']; ?>"
                          class="btn btn-outline-danger m-1"><i class="fa-solid fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="xemthongtin.php?xid=<?php echo $r['MANV']; ?> " class="btn btn-outline-info m-1">Thông
                          tin</a>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>

            </action-table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include('../footer.php'); ?>