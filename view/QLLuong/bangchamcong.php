<?php include('../menu.php') ?>
<div class="container-fluid">
  <div class="mb-3">
    <h4>Chấm công</h4>
  </div>
  <div class="row">
    <div class="col-12 d-flex">
      <div class="card border-0">
        <div class="card-header">
          <h5 class="card-title">Thêm chấm công</h5>

        </div>
        <div class="card-body">
          

            <form action="themchamcong.php" method="post" class="needs-validation" novalidate>
              <div class="mb-3">
                <label for="phuCap" class="form-label"><strong>Chấm công cho tháng: </strong></label>
                <input type="month" min="2020-01" value="2024-12" name="thang" class="form-control" placeholder="Nhập tháng chấm công..." required></input>
              </div>
              
              
              <div class="mb-3">
                <label for="employee" class="form-label"><strong>Chọn nhân viên: </strong></label>
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
                <label for="ngayCong" class="form-label"><strong>Số ngày công:</strong></label>
                <input type="number" class="form-control" name="songaycong" placeholder="Nhập số ngày công ..." required>
              </div>
              <div class="mb-3">
                <label for="ngayCong" class="form-label"><strong>Số giờ tăng ca:</strong></label>
                <input type="number" class="form-control" name="sogiotangca" placeholder="Nhập số giờ tăng ca ..." required>
              </div>

              
              

              <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                Thêm</button>
            </form>

          


        </div>
      </div>
    </div>
  </div>
</div>


<?php include('../footer.php') ?>