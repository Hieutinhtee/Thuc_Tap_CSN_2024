<?php include('menu.php'); ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12 d-flex">
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Tạo đơn kiến nghị</h5>
                </div>
                <div class="card-body">
                    <form action="taogopy.php" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="degreeName" class="form-label">Tiêu đề: </label>
                            <input name="tieude" type="text" class="form-control" id="tenbangcap"
                                placeholder="Nhập tiêu đề..." required>
                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Nội dung đề xuất</label>
                            <textarea class="form-control" id="reason" rows="4" placeholder="Nhập nội dung..."
                                name="noidung" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dateCreat" class="form-label"><strong>Ngày tạo</strong></label>
                            <input name="ngaytao" id="ngaytao" class="form-control bg-secondary-subtle"
                                value="<?php echo date('d-m-Y'); ?>" readonly>
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

<div class="row">
    <div class="col-12 d-flex">
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title">Danh sách đơn đã kiến nghị</h5>
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../connect.php';
                        $manv = $_SESSION['manv'];
                        $stmt = $conn->prepare("SELECT * FROM KIENNGHI WHERE MANV=$manv");
                        $stmt->execute();
                        $stt = 0;
                        foreach ($stmt->fetchAll() as $r) {
                            ?>
                            <tr>
                                <th><?php echo $stt += 1; ?></th>
                                <td><?php echo $r['TIEUDE']; ?></td>
                                <td class="limited-width"><?php echo $r['NOIDUNG']; ?></td>
                                <td><?php echo $r['NGAYTAO']; ?></td>
                                <td><a onclick="return confirm('Xác nhận xóa');"
                                        href="xoagopy.php?xid=<?php echo $r['MAKIENNGHI']; ?>"
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
<?php include('footer.php'); ?>