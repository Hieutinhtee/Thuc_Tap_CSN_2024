<?php include('../menu.php'); ?>
<?php
require_once '../connect.php';
$id = $_GET['xid'];
$sql = "SELECT * FROM NHANVIEN WHERE MANV = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$r = $stmt->fetch(PDO::FETCH_ASSOC); ?>
<div class="container-fluid">
    <div class="mb-3">
        <h4>Quản lý nhân viên</h4>
    </div>
    <div class="row">
        <div class="col-12 d-flex">
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Sửa thông tin nhân viên <?php echo $r['MANV']; ?>. <?php echo $r['TENNV']; ?>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="xulisuanhanvien.php?xid=<?php echo $r['MANV']; ?>" method="post"
                            class="row g-3 needs-validation" novalidate>
                            <div>
                                <label for="validationCustom01" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="tennv" value="<?php echo $r['TENNV']; ?>">

                            </div>
                            <div>
                                <label for="validationCustom01" class="form-label">Số CMND</label>
                                <input type="text" class="form-control" name="cmnd" value="<?php echo $r['CMND']; ?>">
                            </div>

                            <div>
                                <label for="validationCustom04" class="form-label">Giới tính</label>
                                <select class="form-select" id="gioitinh1">
                                    <option selected disabled value="<?php echo $r['GIOITINH']; ?>">
                                        <?php echo $r['GIOITINH']; ?>
                                    </option>
                                    <option>Nam</option>
                                    <option>Nữ</option>

                                </select>

                            </div>
                            <div>
                                <label for="validationCustom02" class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control" name="ngaysinh"
                                    value="<?php echo $r['NGAYSINH']; ?>">

                            </div>
                            <div>
                                <label for="validationCustom01" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="diachi"
                                    value="<?php echo $r['DIACHI']; ?>">

                            </div>
                            <div>
                                <label for="validationCustom01" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="sdt" value="<?php echo $r['SDT']; ?>">

                            </div>
                            <div>
                                <label for="validationCustom01" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $r['EMAIL']; ?>">

                            </div>
                            <div>
                                <label for="validationCustom02" class="form-label">Ngày vào làm</label>
                                <input type="date" class="form-control" name="ngayvaolam"
                                    value="<?php echo $r['NGAYVAOLAM']; ?>">

                            </div>
                            <div>
                                <label for="bacLuong" class="form-label">Chọn bằng cấp: </label>
                                <select class="form-control" id="bangcap1" >
                                    <option selected disabled value="<?php echo $r['BANGCAP']; ?>">
                                        <?php echo $r['BANGCAP']; ?>
                                    </option>
                                    <?php
                                    require_once '../connect.php';
                                    $stmt1 = $conn->prepare("SELECT TENBANGCAP FROM BANGCAP");
                                    $stmt1->execute();

                                    foreach ($stmt1->fetchAll() as $r1) {
                                        ?>
                                        <option><?php echo $r1['TENBANGCAP']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="bacLuong" class="form-label">Chọn chức vụ: </label>
                                <select class="form-control" id="chucvu1">
                                    <option selected disabled value="<?php echo $r['CHUCVU']; ?>">
                                        <?php echo $r['CHUCVU']; ?>
                                    </option>
                                    <?php
                                    require_once '../connect.php';
                                    $stmt2 = $conn->prepare("SELECT TENCHUCVU FROM CHUCVU");
                                    $stmt2->execute();

                                    foreach ($stmt2->fetchAll() as $r2) {
                                        ?>
                                        <option><?php echo $r2['TENCHUCVU']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <input hidden class="form-control" id="gioitinh" name="gioitinh" required>
                            <input hidden class="form-control" id="chucvu" name="chucvu" required>
                            <input hidden class="form-control" id="bangcap" name="bangcap" required>
                            <script>
                                document.getElementById('gioitinh').value = document.getElementById('gioitinh1').value;
                                document.getElementById('chucvu').value = document.getElementById('chucvu1').value;
                                document.getElementById('bangcap').value = document.getElementById('bangcap1').value;
                                document.getElementById('gioitinh1').addEventListener('change', function () {
                                    document.getElementById('gioitinh').value = document.getElementById('gioitinh1').value;
                                });
                                document.getElementById('chucvu1').addEventListener('change', function () {
                                    document.getElementById('chucvu').value = document.getElementById('chucvu1').value;
                                });
                                document.getElementById('bangcap1').addEventListener('change', function () {
                                    document.getElementById('bangcap').value = document.getElementById('bangcap1').value;
                                });


                            </script>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>
                                Xác nhận sửa thông tin nhân viên</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../footer.php'); ?>