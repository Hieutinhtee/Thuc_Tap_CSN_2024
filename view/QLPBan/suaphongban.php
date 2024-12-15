<?php include('../menu.php'); ?>
<?php
require_once '../connect.php';
$id = $_GET['xid'];
$sql = "SELECT * FROM PHONGBAN WHERE MAPHONGBAN = $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$r = $stmt->fetch(PDO::FETCH_ASSOC);

?>
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


                    <form action="xulisuaphongban.php" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="departmentsName" class="form-label">Mã phòng ban: </label>
                            <input readonly type="text" class="form-control" name="maphongban"
                                value="<?php echo $r['MAPHONGBAN']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="departmentsName" class="form-label">Tên phòng ban: </label>
                            <input type="text" class="form-control" name="tenphongban"
                                value="<?php echo $r['TENPHONGBAN']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label"><strong>Mô tả:</strong></label>
                            <input id="description" name="motaphongban" class="form-control"
                                value="<?php echo $r['MOTAPHONGBAN']; ?>"></input>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label"><strong>Trưởng phòng: </strong></label>
                            <select class="form-control" id="truongphong" name="truongphong">
                                <?php
                                $stmt1 = $conn->prepare("SELECT MANV,TENNV FROM NHANVIEN WHERE MAPHONGBAN=$id AND CHUCVU='Trưởng phòng'");
                                $stmt1->execute();
                                $r1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <option selected><?php echo $r1['MANV']; ?>-<?php echo $r1['TENNV']; ?></option>
                                <?php
                                require_once '../connect.php';
                                $stmt2 = $conn->prepare("SELECT MANV,TENNV FROM NHANVIEN WHERE MAPHONGBAN IS NULL");
                                $stmt2->execute();
                                foreach ($stmt2->fetchAll() as $r2) {
                                    ?>
                                    <option><?php echo $r2['MANV']; ?>-<?php echo $r2['TENNV']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <input hidden class="form-control" id="manv_old" value="<?php echo $r1['MANV']; ?>"
                            name="manv_old">
                            <input hidden class="form-control" value="<?php echo $r1['TENNV']; ?>"
                            name="tennv_old">
                        <input hidden class="form-control" id="manv" name="manv">
                        <input hidden class="form-control" id="tennv" name="tennv">
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
                            Sửa phòng ban</button>
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
                <h5 class="card-title">Danh sách nhân viên <?php echo $r['TENPHONGBAN']; ?></h5>
                <form action="themnvpb.php" method="post">
                    <input hidden type="text" name="maphongban" value="<?php echo $id; ?>">
                    <div class="input-group">
                        <select class="form-control" id="new_nv_pb" name="new_nv_pb">
                            <option selected disabled value="">--- Chọn nhân viên muốn thêm ---</option>
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
                        <button class="btn btn-success" type="submit">Thêm vào phòng ban</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table text-center table-hover">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã nhân viên</th>
                            <th scope="col">Tên nhân viên</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../connect.php';
                        $stmt3 = $conn->prepare("SELECT * FROM NHANVIEN WHERE MAPHONGBAN=$id");
                        $stmt3->execute();
                        $stt3 = 0;

                        foreach ($stmt3->fetchAll() as $r3) {
                            ?>
                            <tr>
                                <th><?php echo $stt3 += 1; ?></th>
                                <td><?php echo $r3['MANV']; ?></td>
                                <td><?php echo $r3['TENNV']; ?></td>
                                <td><?php echo $r3['CHUCVU']; ?></td>
                                <td><a onclick="return confirm('Xác nhận xóa');"
                                        href="xoanvphongban.php?xid=<?php echo $r3['MANV']; ?>&idpb=<?php echo $id; ?>"
                                        class="btn btn-outline-danger"><i class="fa-solid fa-trash" aria-hidden="true"></i>
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