<?php include('../menu.php') ?>
<div class="container-fluid">
    <div class="mb-3">
        <h4>Quản lý bậc lương</h4>
    </div>
    <div class="row">
        <div class="col-12 d-flex">
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Thêm bậc lương</h5>
                </div>
                <div class="card-body">
                    <form action="thembacluong.php" method="post" class="needs-validation" novalidate>
                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Tên bậc lương</label>
                            <input type="text" class="form-control" name="tenbacluong" required>
                        </div>
                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Lương cơ bản</label>
                            <input type="number" class="form-control" name="lcb" required>
                        </div>
                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Lương tăng ca</label>
                            <input type="number" class="form-control" name="ltc" required>
                        </div>
                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Phụ cấp</label>
                            <input type="number" class="form-control" name="phucap" required>
                        </div>
                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Hỗ trợ</label>
                            <input type="number" class="form-control" name="hotro" required>
                        </div>
                        <button type="submit" class="btn btn-primary m-1"><i class="fa fa-plus" aria-hidden="true"></i>
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
                <h5 class="card-title">Danh sách trình độ</h5>
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
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên bậc lương</th>
                            <th scope="col">Lương cơ bản</th>
                            <th scope="col">Lương tăng ca</th>
                            <th scope="col">Hỗ trợ</th>
                            <th scope="col">Phụ cấp</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../connect.php';
                        $stmt = $conn->prepare("SELECT * FROM BACLUONG");
                        $stmt->execute();
                        $stt = 0;
                        foreach ($stmt->fetchAll() as $r) {
                            ?>
                            <tr>
                                <th><?php echo $stt += 1; ?></th>
                                
                                <td><?php echo $r['TENBACLUONG']; ?></td>
                                <td><?php echo $r['LUONGCOBAN']; ?></td>
                                <td><?php echo $r['LUONGTANGCA']; ?></td>
                                <td><?php echo $r['HOTRO']; ?></td>
                                <td><?php echo $r['PHUCAP']; ?></td>



                                <td><a href="suabacluong.php?xid=<?php echo $r['MABACLUONG']; ?>"
                                        class="btn btn-outline-primary"><i class="fa fa-solid fa-pencil"
                                            aria-hidden="true"></i>
                                    </a></td>
                                <td><a onclick="return confirm('Xác nhận xóa');"
                                        href="xoabacluong.php?xid=<?php echo $r['MABACLUONG']; ?>"
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



<?php include('../footer.php') ?>