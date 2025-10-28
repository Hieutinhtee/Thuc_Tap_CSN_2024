<?php include('../menu.php'); ?>

<div class="row">
    <div class="col-12 d-flex">
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title">BẢNG LƯƠNG NHÂN VIÊN</h5>
            </div>
            <div class="card-body">
                <action-table store urlparams pagination="15">
                    <div>
                        <action-table-filters>
                            <div class="flex flex-col">
                                <div>
                                    <!-- Search Field -->
                                    <div class="input-group mb-3 col-5">
                                        <span class="input-group-text" id="basic-addon1">Tìm kiếm</span>
                                        <input class="form-control " aria-describedby="basic-addon1"
                                            id="action-table-search" name="action-table" type="search"
                                            placeholder="Search">
                                    </div>
                                </div>
                            </div>
                        </action-table-filters>
                    </div>
                    <table class="table flex-grow-1 table-hover table-bordered text-center">
                        <thead class="table-info">
                            <tr>
                                <th>STT</th>
                                <th>Mã nhân viên</th>
                                <th>Tên nhân viên</th>
                                <th>Thời gian</th>
                                <th>Số ngày công</th>
                                <th>Số giờ tăng ca</th>
                                <th>Lương cơ sở</th>
                                <th>Hệ số lương</th>
                                <th>Lương cơ bản(8h/ngày)</th>
                                <th>Vi phạm</th>
                                <th>Thưởng</th>
                                <th>Phụ cấp(thâm niên, chức vụ)</th>
                                <th>Phụ cấp công tác</th>
                                <th>Thực lĩnh</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../connect.php';
                            $stmt = $conn->prepare("SELECT * FROM CHAMCONG");
                            $stmt->execute();
                            $stt = 0;
                            foreach ($stmt->fetchAll() as $r) {
                                ?>
                                <tr>
                                    <th><?php echo $stt += 1; ?></th>
                                    <td><?php echo $r['MANV']; ?></td>
                                    <td><?php echo $r['TENNV']; ?></td>
                                    <td><?php echo $r['THOIGIAN']; ?></td>

                                    <td><?php echo $r['SOGIOLAM']; ?></td>
                                    <td><?php echo $r['SOGIOTANGCA']; ?></td>
                                    <td class="money"><?php echo $r['LUONGCOSO']; ?></td>
                                    <td><?php echo $r['HESOLUONG']; ?></td>
                                    <td class="money"><?php echo $r['LUONGCOBAN']; ?></td>
                                    <td class="money"><?php echo $r['TIENVIPHAM']; ?></td>
                                    <td class="money"><?php echo $r['THUONG']; ?></td>
                                    <td class="money"><?php echo $r['PHUCAP']; ?></td>
                                    <td class="money"><?php echo $r['PHUCAPCONGTAC']; ?></td>
                                    <td class="money"><?php echo $r['THUCLINH']; ?></td>
                                    <td><a onclick="return confirm('Xác nhận xóa');"
                                            href="xoachamcong.php?xid=<?php echo $r['MACHAMCONG']; ?>"
                                            class="btn btn-outline-danger m-1"><i class="fa-solid fa-trash"
                                                aria-hidden="true"></i>
                                        </a></td>

                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <action-table-pagination label="Showing {rows} of {total}:"></action-table-pagination>
                    <action-table-pagination-options options="15,20,30,40"
                        label="Rows per:"></action-table-pagination-options>
                </action-table>


            </div>
        </div>
    </div>
</div>
<?php include('../footer.php'); ?>