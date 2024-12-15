<?php include('menu.php'); ?>

<div class="container-fluid">
    
    <div class="row">
        <div class="col-12 d-flex">
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Tạo đơn xin nghỉ phép</h5>
                </div>
                <div class="card-body">
                    <form action="xulitaonghiphep.php" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Lý Do</label>
                            <textarea class="form-control" id="reason" rows="3" placeholder="Nhập lý do" name="lydonghi"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Ngày bắt đầu nghỉ</label>
                            <input type="date" class="form-control" id="startDate" name="batdau" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">Ngày đi làm trở lại</label>
                            <input type="date" class="form-control" id="endDate" name="ketthuc" required>
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
<?php include('footer.php'); ?>