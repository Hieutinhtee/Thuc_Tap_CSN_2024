<?php include('../menu.php'); ?>
<div class="container-fluid">
  <div class="mb-3">
    <h4>Phòng ban</h4>
  </div>
  <div class="row">
    <div class="col-12 d-flex">
      <div class="card border-0">
        <div class="card-header">
          <h5 class="card-title">Tạo phòng ban</h5>

        </div>
        <div class="card-body">
          

            <form action="themphongban.php" method="post" class="needs-validation" novalidate>
              
              <div class="mb-3">
                <label for="departmentsName" class="form-label">Tên phòng ban: </label>
                <input type="text" class="form-control" name="tenphongban" placeholder="Nhập tên phòng ban" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label"><strong>Mô tả:</strong></label>
                <input id="description" name="motaphongban" class="form-control" placeholder="Nhập mô tả..."></input>
              </div>
              <div class="mb-3">
                <label for="position" class="form-label"><strong>Trưởng phòng: </strong></label>
                <select class="form-control" id="truongphong" name="truongphong" required>
                  <option selected disabled value="">--- Chọn nhân viên ---</option>
                  <?php
                  require_once '../connect.php';
                  $stmt = $conn->prepare("SELECT MANV,TENNV FROM NHANVIEN WHERE MAPHONGBAN IS NULL");
                  $stmt->execute();

                  foreach ($stmt->fetchAll() as $r) {
                    ?>
                    <option><?php echo $r['MANV']; ?>-<?php echo $r['TENNV']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <input hidden class="form-control" id="manv" name="manv" required>
                <input hidden class="form-control" id="tennv" name="tennv" required>
                <script>
                  const selectElement = document.getElementById('truongphong');
                  const resultElement = document.getElementById('manv');
                  const resultElement1 = document.getElementById('tennv');
                  selectElement.addEventListener('change', function () {

                    resultElement.value = selectElement.value.replace(/-.*$/, '');
                    resultElement1.value = selectElement.value.replace(/^[^-]*-/, '');
                  });
                </script>

              <div class="mb-3">
                <label for="dateCreat" class="form-label"><strong>Ngày tạo</strong></label>
                <input class="form-control bg-secondary-subtle" name="ngaytaophongban"
                        value="<?php echo date('d-m-Y'); ?>" readonly>
              </div>
              <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                Thêm phòng ban</button>
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
          
        </div>
      </div>
      <div class="card-body">
        <table class="table text-center table-hover">
          <thead class="table-warning">
            <tr>
              <th scope="col">STT</th>         
              <th scope="col">Tên phòng ban</th>
              <th scope="col">Mô tả</th>              
              <th scope="col">Trưởng phòng</th>    
              <th scope="col">Số thành viên</th>                    
              <th scope="col">Sửa</th>
              <th scope="col">Xóa</th>
            </tr>
          </thead>
          <tbody>
          <?php
                    require_once '../connect.php';
                    $stmt = $conn->prepare("SELECT * FROM PHONGBAN");
                    $stmt->execute();
                    $stt = 0;
                    
                    foreach ($stmt->fetchAll() as $r) {
                      $idpb = $r['MAPHONGBAN'];
                      $sql = $conn->query("SELECT * FROM NHANVIEN where MAPHONGBAN= $idpb ");
                      $soluongnhanvienphongban = $sql->rowCount();
                      ?>
                      <tr>
                        <th><?php echo $stt += 1; ?></th>
                        <td><?php echo $r['TENPHONGBAN']; ?></td>
                        <td class="col-5"><?php echo $r['MOTAPHONGBAN']; ?></td>
                        <td><?php echo $r['MATRUONGPHONG']; ?>.<?php echo $r['TENTRUONGPHONG']; ?></td>
                        
                        <td><?php echo $soluongnhanvienphongban; ?></td>

                        <td><a href="suaphongban.php?xid=<?php echo $r['MAPHONGBAN']; ?>" class="btn btn-outline-primary"><i class="fa fa-solid fa-pencil"
                              aria-hidden="true"></i>
                          </a></td>
                        <td><a onclick="return confirm('Xác nhận xóa');" href="xoaphongban.php?xid=<?php echo $r['MAPHONGBAN']; ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash" aria-hidden="true"></i>
                          </a></td>
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


<?php include('../footer.php'); ?>