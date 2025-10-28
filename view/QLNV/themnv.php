<?php include('../menu.php'); ?>
<div class="container-fluid">
    <div class="mb-3">
        <h4>Quản lý nhân viên</h4>
    </div>
    <div class="row">
        <div class="col-12 d-flex">
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Thêm nhân viên</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="../TongQuan/themnvform.php" method="post" enctype="multipart/form-data" class="row g-3 needs-validation"
                            novalidate>
                            <?php
                                if(isset($_GET['error'])){
                            ?>
                                <div class="alert alert-danger">Vui lòng chọn đúng định dạng ảnh yêu cầu!!!</div>
                            <?php        
                                }
                            ?>
                            <div>
                                <label for="validationCustom01" class="form-label">Ảnh nhân viên</label>
                                <input type="file" class="form-control" id="pp" name="pp" required>
                                <p style="color: #842029;">Chỉ chấp nhận định dạng *.jpg, *.png, *.jpeg</p>
                            </div>
                            <div>
                                <label for="validationCustom01" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="tennv" required>

                            </div>
                            <div>
                                <label for="validationCustom01" class="form-label">Số CMND</label>
                                <input type="number" class="form-control" name="cmnd" required>
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
                                <input type="number" class="form-control" name="sdt" required>

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

<?php include('../footer.php'); ?>