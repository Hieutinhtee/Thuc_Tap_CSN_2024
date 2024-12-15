<?php include('../menu.php'); ?>
<?php
    $id = $_GET["xid"];
    require_once '../connect.php';


    try {
        
        $sql = "SELECT * FROM BANGCAP WHERE MABANGCAP=$id";
        $stmt = $conn->prepare($sql);
		$stmt->execute();
		$r = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

?>
<div class="container-fluid">
    <div class="mb-3">
        <h4>Bằng cấp</h4>
    </div>
    <div class="row">
        <div class="col-12 d-flex">
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">Thêm bằng cấp</h5>

                </div>
                <div class="card-body">


                    <form action="xulisuabangcap.php?suaid=<?php echo $r['MABANGCAP']; ?>" method="post" class="needs-validation" novalidate>
                        
                        <div class="mb-3">
                            <label for="degreeName" class="form-label">Tên bằng cấp: </label>
                            <input name="tenbangcap" type="text" class="form-control" id="tenbangcap"
                                placeholder="Nhập tên bằng cấp" value="<?php echo $r['TENBANGCAP']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label"><strong>Mô tả:</strong></label>
                            <input name="motabangcap" id="motabangcap" class="form-control"
                                placeholder="Nhập mô tả..." value="<?php echo $r['MOTABANGCAP']; ?>"></input>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label"><strong>Người tạo</strong></label>
                            <input type="text" id="position" class="form-control bg-secondary-subtle" value="Admin"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="dateCreat" class="form-label"><strong>Ngày tạo</strong></label>
                            <input name="ngaytaobangcap" id="ngaytao" class="form-control bg-secondary-subtle"
                                value="<?php echo date('d-m-Y'); ?>" readonly>
                        </div>
                        <button type="submit" id="thembangcap" class="btn btn-primary"><i class="fa fa-plus"
                                aria-hidden="true"></i>
                            Lưu lại chỉnh sửa bằng cấp</button>
                    </form>




                </div>
            </div>
        </div>
    </div>
</div>


<?php include('../footer.php'); ?>