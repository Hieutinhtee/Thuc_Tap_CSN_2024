<?php include('../menu.php'); ?>
<div class="container-fluid">
    <div class="mb-3">
        <h4>Khen thưởng kỉ luật</h4>
    </div>
    <div class="row">
        <div class="col-12 d-flex">
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Tạo đánh giá khen thưởng, vi phạm nhân sự</h5>
                </div>
                <div class="card-body">


                    <form action="themdanhgia.php" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="position" class="form-label"><strong>Loại đánh giá: </strong></label>
                            <select class="form-control" name="loaidanhgia" required>
                                <option selected disabled value="">--- Chọn loại ---</option>
                                <option value="Khen thưởng">Khen thưởng</option>
                                <option value="Vi phạm">Vi phạm</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label"><strong>Lý do:</strong></label>
                            <input id="description" name="lydo" class="form-control" placeholder="Nhập mô tả lý do..."
                                required></input>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label"><strong>Đối tượng nhân viên: </strong></label>
                            <select class="form-control" id="truongphong" name="truongphong" required>
                                <option selected disabled value="">--- Chọn nhân viên ---</option>
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
                            <label for="departmentsName" class="form-label"><strong>Số tiền: </strong></label>
                            <input type="text" class="form-control money-input" name="sotien"
                                placeholder="Nhập số tiền ..." required>
                        </div>
                        <div class="mb-3">
                            <label for="dateCreat" class="form-label"><strong>Thời gian</strong></label>
                            <input type="date" class="form-control" name="ngaytao" required>
                            
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Thêm đánh giá</button>
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
                <h5 class="card-title">Danh sách khen thưởng, vi phạm</h5>
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
                            <th scope="col">Loại đánh giá</th>
                            <th scope="col">Mô tả lý do</th>
                            <th>Thời gian</th>
                            <th scope="col">Mã nhân viên</th>
                            <th scope="col">Tên nhân viên</th>
                            <th scope="col">Số tiền</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../connect.php';
                        $stmt = $conn->prepare("SELECT * FROM DANHGIA");
                        $stmt->execute();
                        $stt = 0;

                        foreach ($stmt->fetchAll() as $r) {
                            ?>
                            <tr>
                                <th><?php echo $stt += 1; ?></th>
                                <td><?php echo $r['LOAIDANHGIA']; ?></td>
                                <td><?php echo $r['LYDO']; ?></td>
                                <td><?php echo $r['THOIGIAN']; ?></td>
                                <td><?php echo $r['MANV']; ?></td>
                                <td><?php echo $r['TENNV']; ?></td>
                                <td class="money"><?php echo $r['SOTIEN']; ?></td>
                                <td><a onclick="return confirm('Xác nhận xóa');"
                                        href="xoadanhgia.php?xid=<?php echo $r['MADANHGIA']; ?>"
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