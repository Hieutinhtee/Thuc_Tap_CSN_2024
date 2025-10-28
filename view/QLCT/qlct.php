<?php include('../menu.php'); ?>
<div class="container-fluid">
  <div class="mb-3">
    <h4>Công tác</h4>
  </div>
  <div class="row">
    <div class="col-12 d-flex">
      <div class="card border-0">
        <div class="card-header">
          <h5 class="card-title">Thêm công tác</h5>

        </div>
        <div class="card-body">
          <form action="themcongtac.php" method="post" class="needs-validation" novalidate>

            <div class="mb-3">
              <label for="employee" class="form-label">Chọn nhân viên: </label>
              <select class="form-control" id="nhanvien" required>
                <option selected disabled value="">Chọn nhân viên...</option>
                <?php
                require_once '../connect.php';
                $stmt = $conn->prepare("SELECT MANV,TENNV FROM NHANVIEN");
                $stmt->execute();

                foreach ($stmt->fetchAll() as $r) {
                  ?>
                  <option><?php echo $r['MANV']; ?>-<?php echo $r['TENNV']; ?></option>
                  <?php
                }
                ?>
              </select>
              <input hidden class="form-control" id="manv" name="manv" required>
              <input hidden class="form-control" id="tennv" name="tennv" required>
              <script>
                const selectElement = document.getElementById('nhanvien');
                const resultElement = document.getElementById('manv');
                const resultElement1 = document.getElementById('tennv');
                selectElement.addEventListener('change', function () {

                  resultElement.value = selectElement.value.replace(/-.*$/, '');
                  resultElement1.value = selectElement.value.replace(/^[^-]*-/, '');
                });
              </script>

            </div>
            <div class="mb-3">
              <label for="dateStart" class="form-label">Ngày bắt đầu</label>
              <input type="date" class="form-control" id="dateStart" name="batdau" required>
            </div>
            <div class="mb-3">
              <label for="dateEnd" class="form-label">Ngày kết thúc</label>
              <input type="date" class="form-control" id="dateEnd" name="ketthuc" required>
            </div>
            <div class="mb-3">
              <label for="diaDiemCT" class="form-label"><strong>Địa điểm công tác</strong></label>
              <input id="diaDiemCT" class="form-control" placeholder="Nhập địa điểm công tác" name="diadiem"
                required></input>
            </div>
            <div class="mb-3">
              <label for="mucdich" class="form-label"><strong>Mục đích công tác</strong></label>
              <textarea name="mucdich" class="form-control" placeholder="Nhập mục đích công tác" rows="4"
                required></textarea>
            </div>
            <div class="mb-1">
              <label for="ngayCong" class="form-label">Hỗ trợ công tác</label>
              <input type="text" class="form-control money-input" placeholder="Nhập tiền hỗ trợ công tác..."
                name="hotro" required>
            </div>
            <button type="submit" class="btn btn-primary m-2"><i class="fa fa-plus" aria-hidden="true"></i>
              Thêm</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 d-flex">
    <div class="card border-0">
      <div class="card-header">
        <h5 class="card-title">Danh sách kế hoạc công tác</h5>
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
        <action-table>
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
          <table class="table table-hover text-center">
            <thead class="table-warning">
              <tr>
                <th>STT</th>
                <th>Mã nhân viên</th>
                <th>Tên nhân viên</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Địa điểm</th>
                <th>Mục đích</th>
                <th>Tiền phụ cấp công tác</th>
                <th>Xóa</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once '../connect.php';
              $stmt = $conn->prepare("SELECT * FROM CONGTAC");
              $stmt->execute();
              $stt = 0;
              foreach ($stmt->fetchAll() as $r) {
                ?>
                <tr>
                  <th><?php echo $stt += 1; ?></th>
                  <td><?php echo $r['MANV']; ?></td>
                  <td><?php echo $r['TENNV']; ?></td>

                  <td><?php echo $r['NGAYBATDAU']; ?></td>
                  <td><?php echo $r['NGAYKETTHUC']; ?></td>
                  <td><?php echo $r['DIADIEM']; ?></td>

                  <td><?php echo $r['MUCDICH']; ?></td>
                  <td class="money"><?php echo $r['HOTRO']; ?></td>
                  <td><a onclick="return confirm('Xác nhận xóa');"
                      href="xoacongtac.php?xid=<?php echo $r['MACONGTAC']; ?>" class="btn btn-outline-danger"><i
                        class="fa-solid fa-trash" aria-hidden="true"></i>
                    </a></td>
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



<?php include('../footer.php'); ?>