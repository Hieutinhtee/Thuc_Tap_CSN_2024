<?php include('../menu.php'); ?>
<div class="container-fluid">
  <div class="mb-3">
    <h4>Hòm thư góp ý</h4>
  </div>
</div>
<div class="row">
    <div class="col-12 d-flex">
        <div class="card border-0">
            <div class="card-header">
                <h5 class="card-title">Danh sách đơn kiến nghị của nhân sự</h5>
            </div>
            <div class="card-body">
                <table class="table text-center table-hover">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">STT</th>
                            
                            <th scope="col">Tiêu đề</th>
                            <th>Mã nhân viên</th>
                            <th>Tên nhân viên</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Ngày tạo</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../connect.php';
                        $manv = $_SESSION['manv'];
                        $stmt = $conn->prepare("SELECT * FROM KIENNGHI");
                        $stmt->execute();
                        $stt = 0;
                        foreach ($stmt->fetchAll() as $r) {
                            ?>
                            <tr>
                                <th><?php echo $stt += 1; ?></th>
                                <td><?php echo $r['TIEUDE']; ?></td>
                                <td><?php echo $r['MANV']; ?></td>
                                <td><?php echo $r['TENNV']; ?></td>
                                <td class="limited-width"><?php echo $r['NOIDUNG']; ?></td>
                                <td><?php echo $r['NGAYTAO']; ?></td>
                                
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