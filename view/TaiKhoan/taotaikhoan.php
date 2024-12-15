<?php include('../menu.php'); ?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-md d-flex">
              <div class="card">
                <div class="card-header">
                  <h5>Tạo mới đăng nhập</h5>
                </div>
                <div class="card-body">
                  <form action="savetaonhanvien.php" class="needs-validation" method="post" id="myForm" novalidate>
                    <div class="mb-3">
                      <label for="employee" class="form-label">Chọn nhân viên: </label>
                      <select class="form-control" id="employee" name="employee" required>
                        <option selected disabled value="">--- Chọn nhân viên ---</option>
                        <?php
                        require_once '../connect.php';
                        $stmt = $conn->prepare("SELECT MANV,TENNV FROM NHANVIEN WHERE TENTAIKHOAN IS NULL");
                        $stmt->execute();

                        foreach ($stmt->fetchAll() as $r) {
                          ?>
                          <option><?php echo $r['MANV']; ?>-<?php echo $r['TENNV']; ?></option>
                          <?php
                        }
                        ?>
                      </select>

                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Tên tài khoản</label>
                      <input readonly type="text" class="form-control" id="tentaikhoan" name="tentaikhoan" required>
                    </div>
                    <script>
                      const selectElement = document.getElementById('employee');
                      const resultElement = document.getElementById('tentaikhoan');
                      selectElement.addEventListener('change', function () {

                        resultElement.value = selectElement.value.replace(/-.*$/, '');
                      });
                    </script>

                    <div class="mb-3">
                      <label for="password" class="form-label">Mật khẩu(*)</label>
                      <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Nhập lại mật khẩu(*)</label>
                      <input type="password" class="form-control" id="confirmPassword" name="matkhau"
                        placeholder="Nhập lại mật khẩu" required>
                    </div>
                    <script>
                      const form = document.getElementById('myForm');

                      form.addEventListener('submit', (event) => {
                        event.preventDefault(); // Prevent default form submission

                        const password = document.getElementById('password').value;
                        const confirmPassword = document.getElementById('confirmPassword').value;

                        if (password !== confirmPassword) {
                          alert('Mật khẩu xác nhận không trùng khớp, vui lòng nhập lại!!!');
                          return;

                        }

                        // If passwords match, submit the form
                        form.submit();
                      });
                    </script>
                    <div class="mb-3">
                      <label for="employee" class="form-label">Chọn quyền hạn: </label>
                      <select class="form-control" id="employee" name="quyenhan" required>
                        <option selected disabled value="">--- Chọn phân quyền ---</option>
                        <option value="Quản trị viên">Quản trị viên</option>
                        <option value="Nhân viên">Nhân viên</option>

                      </select>
                      
                    </div>

                    <button href="savetaonhanvien.php" type="submit" class="btn btn-primary">Lưu lại</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include('../footer.php'); ?>