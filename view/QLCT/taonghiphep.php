<?php include('../menu.php'); ?>
<div class="container-fluid">
  <div class="mb-3">
    <h4>Tạo Đơn Nghỉ Phép</h4>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card border-0">
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label for="employeeCode" class="form-label">Mã nhân viên</label>
              <input type="text" class="form-control" id="employeeCode" placeholder="Nhập mã nhân viên" required>
            </div>
            <div class="mb-3">
              <label for="reason" class="form-label">Lý Do</label>
              <textarea class="form-control" id="reason" rows="3" placeholder="Nhập lý do" required></textarea>
            </div>
            <div class="mb-3">
              <label for="startDate" class="form-label">Ngày bắt đầu nghỉ</label>
              <input type="date" class="form-control" id="startDate" required>
            </div>
            <div class="mb-3">
              <label for="endDate" class="form-label">Ngày đi làm trở lại</label>
              <input type="date" class="form-control" id="endDate" required>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">Tạo Đơn</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('../footer.php'); ?>