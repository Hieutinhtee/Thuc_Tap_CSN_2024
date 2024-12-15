<?php include('menu.php'); ?>
<div class="row">
    <div class="col-12 d-flex">
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title">Danh sách chức vụ</h5>
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
                            <th scope="col">Mã chức vụ</th>
                            <th scope="col">Tên chức vụ</th>

                            <th scope="col">Mô tả</th>
                            <th scope="col">Người tạo</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../connect.php';
                        $stmt = $conn->prepare("SELECT * FROM CHUCVU");
                        $stmt->execute();
                        $stt = 0;
                        foreach ($stmt->fetchAll() as $r) {
                            ?>
                            <tr>
                                <th><?php echo $stt += 1; ?></th>
                                <td><?php echo $r['MACHUCVU']; ?></td>
                                <td><?php echo $r['TENCHUCVU']; ?></td>

                                <td class="limited-width"><?php echo $r['MOTACHUCVU']; ?></td>
                                <td>Admin</td>
                                <td><?php echo $r['NGAYTAOCHUCVU']; ?></td>

                                <td><a href="suachucvu.php?xid=<?php echo $r['MACHUCVU']; ?>"
                                        class="btn btn-outline-primary"><i class="fa fa-solid fa-pencil"
                                            aria-hidden="true"></i>
                                    </a></td>
                                <td><a href="" class="btn btn-outline-danger"><i class="fa-solid fa-trash"
                                            aria-hidden="true"></i>
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