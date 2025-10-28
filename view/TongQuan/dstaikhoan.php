<?php include('../menu.php'); ?>
<div class="container-fluid">

  <div class="row">
    <div class="col-12 d-flex">
      <div class="card border-0">
        <div class="card-header">
          <h5 class="card-title">Danh sách tài khoản</h5>
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
          </div>
        </div>
        <div class="card-body">
          <table class="table text-center table-responsive">
            <thead class="table-info">
              <tr>
                <th scope="col">Mã nhân viên</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Họ tên</th>

                <th scope="col">Tài Khoản</th>
                <th scope="col">Mật khẩu</th>
                <th scope="col">Quyền hạn</th>

                <th colspan="2" scope="col" class="text-center">Xóa tài khoản</th>


              </tr>
            </thead>
            <tbody>
              <?php
              require_once '../connect.php';
              $stmt = $conn->prepare("SELECT * FROM NHANVIEN WHERE MATKHAU IS NOT NULL AND QUYENHAN='Nhân viên'");
              $stmt->execute();

              foreach ($stmt->fetchAll() as $r) {
                ?>
                <tr>
                  <td><?php echo $r['MANV']; ?> </td>
                  <td><img src="../image/<?php echo $r['ANHNV']; ?>" alt="loi" style="max-width: 90px; max-height: 120px; object-fit: cover; border-radius: 10px">
                  </td>
                  <td><?php echo $r['TENNV']; ?></td>
                  <td><?php echo $r['TENTAIKHOAN']; ?></td>
                  <td class="col-5"><?php echo $r['MATKHAU']; ?></td>
                  <td><?php echo $r['QUYENHAN']; ?></td>
                  <td><a onclick="return confirm('Xác nhận xóa');" href="xoaTKMK.php?xid=<?php echo $r['MANV']; ?>"
                      class="btn btn-outline-danger"><i class="fa-solid fa-trash" aria-hidden="true"></i></a></td>
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