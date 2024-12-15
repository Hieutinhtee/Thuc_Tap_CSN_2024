<?php include('menu.php'); ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-12 d-flex">
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Danh mục đơn xin nghỉ</h5>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#rejected2" data-bs-toggle="tab">Đang chờ phê duyệt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#accepted" data-bs-toggle="tab">Đã chấp nhận</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#rejected1" data-bs-toggle="tab">Đã từ chối</a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="rejected2">
                            <div class="row">
                                <div class="col-12 d-flex">
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <table class="table table-hover text-center">
                                                <thead class="table-warning">
                                                    <tr>
                                                        <th style="text-align: center;">STT</th>
                                                        <th style="text-align: center;">Mã nhân viên</th>
                                                        <th style="text-align: center;">Tên nhân viên</th>
                                                        <th style="text-align: center;">Ngày bắt đầu nghỉ</th>
                                                        <th style="text-align: center;">Ngày đi làm lại</th>
                                                        <th style="text-align: center;">Lý do</th>
                                                        

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    require_once '../connect.php';
                                                    $stmt = $conn->prepare("SELECT * FROM NGHIPHEP WHERE PHEDUYET=0 AND MANHANVIEN=$id");
                                                    $stmt->execute();
                                                    $stt = 0;
                                                    foreach ($stmt->fetchAll() as $r) {
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $stt += 1; ?></th>
                                                            <td><?php echo $r['MANHANVIEN']; ?></td>
                                                            <td><?php echo $r['TENNV']; ?></td>
                                                            <td><?php echo $r['NGAYBATDAUNGHI']; ?></td>
                                                            <td><?php echo $r['NGAYDILAMLAI']; ?></td>
                                                            <td><?php echo $r['LYDO']; ?></td>
                                                            

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
                        </div>

                        <!-- Đã chấp nhận -->
                        <div class="tab-pane fade " id="accepted">
                            <div class="row">
                                <div class="col-12 d-flex">
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <table class="table table-hover text-center">
                                                <thead class="table-warning">
                                                    <tr>
                                                        <th style="text-align: center;">STT</th>
                                                        <th style="text-align: center;">Mã nhân viên</th>
                                                        <th style="text-align: center;">Tên nhân viên</th>
                                                        <th style="text-align: center;">Ngày bắt đầu nghỉ</th>
                                                        <th style="text-align: center;">Ngày đi làm lại</th>
                                                        <th style="text-align: center;">Lý do</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    require_once '../connect.php';
                                                    $stmt = $conn->prepare("SELECT * FROM NGHIPHEP WHERE PHEDUYET=1");
                                                    $stmt->execute();
                                                    $stt = 0;
                                                    foreach ($stmt->fetchAll() as $r) {
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $stt += 1; ?></th>
                                                            <td><?php echo $r['MANHANVIEN']; ?></td>
                                                            <td><?php echo $r['TENNV']; ?></td>
                                                            <td><?php echo $r['NGAYBATDAUNGHI']; ?></td>
                                                            <td><?php echo $r['NGAYDILAMLAI']; ?></td>
                                                            <td><?php echo $r['LYDO']; ?></td>
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
                        </div>

                        <!-- Đã từ chối -->
                        <div class="tab-pane fade" id="rejected1">
                            <div class="row">
                                <div class="col-12 d-flex">
                                    <div class="card border-0">
                                        <div class="card-body">

                                            <table class="table table-hover text-center">
                                                <thead class="table-warning">
                                                    <tr>
                                                        <th style="text-align: center;">STT</th>
                                                        <th style="text-align: center;">Mã nhân viên</th>
                                                        <th style="text-align: center;">Tên nhân viên</th>
                                                        <th style="text-align: center;">Ngày bắt đầu nghỉ</th>
                                                        <th style="text-align: center;">Ngày đi làm lại</th>
                                                        <th style="text-align: center;">Lý do</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    require_once '../connect.php';
                                                    $stmt = $conn->prepare("SELECT * FROM NGHIPHEP WHERE PHEDUYET=2");
                                                    $stmt->execute();
                                                    $stt = 0;
                                                    foreach ($stmt->fetchAll() as $r) {
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $stt += 1; ?></th>
                                                            <td><?php echo $r['MANHANVIEN']; ?></td>
                                                            <td><?php echo $r['TENNV']; ?></td>
                                                            <td><?php echo $r['NGAYBATDAUNGHI']; ?></td>
                                                            <td><?php echo $r['NGAYDILAMLAI']; ?></td>
                                                            <td><?php echo $r['LYDO']; ?></td>
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
                        </div>

                        <!-- Đã từ chối -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>