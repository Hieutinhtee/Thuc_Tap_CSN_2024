<?php include('../menu.php'); ?>
<?php
require_once '../connect.php';
$idchucvu = $_GET['xid'];
$sql = "SELECT * FROM CHUCVU WHERE MACHUCVU = $idchucvu";
$stmt = $conn->prepare($sql);
$stmt->execute();
$r = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="container-fluid">

    <div class="mb-3">
        <h4>Chức vụ</h4>
    </div>
    <div class="row">
        <div class="col-12 d-flex">
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Sửa chức vụ</h5>

                </div>
                <div class="card-body">


                    <form action="xulisuachucvu.php" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="positionName" class="form-label"><strong>Mã chức vụ:</strong> </label>
                            <input type="text" readonly class="form-control" value="<?php echo $r['MACHUCVU']; ?>"
                                id="positionName" name="machucvu">
                        </div>
                        <div class="mb-3">
                            <label for="positionName" class="form-label"><strong>Tên chức vụ:</strong> </label>
                            <input type="text" class="form-control" id="positionName"
                                value="<?php echo $r['TENCHUCVU']; ?>" name="tenchucvu">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label"><strong>Mô tả:</strong></label>
                            <textarea class="form-control" aria-label="With textarea"
                                name="motachucvu"><?php echo $r['MOTACHUCVU']; ?></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label"><strong>Người sửa</strong></label>
                            <input type="text" id="position" class="form-control bg-secondary-subtle" value="Admin"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="dateCreat" class="form-label"><strong>Ngày sửa</strong></label>
                            <input class="form-control bg-secondary-subtle" name="ngaytaochucvu"
                                value="<?php echo date('d-m-Y'); ?>" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Sửa chức vụ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../footer.php'); ?>