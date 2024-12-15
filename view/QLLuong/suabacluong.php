<?php include('../menu.php'); ?>
<?php
    $id = $_GET["xid"];
    require_once '../connect.php';


    try {
        
        $sql = "SELECT * FROM BACLUONG WHERE MABACLUONG=$id";

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


                    <form action="xulisuabacluong.php?suaid=<?php echo $r['MABACLUONG']; ?>" method="post" class="needs-validation" novalidate>
                        
                        <div class="mb-1">
                            <label for="degreeName" class="form-label">Tên bậc lương: </label>
                            <input name="tenbacluong" type="text" class="form-control" id="tenbacluong"
                                placeholder="Nhập tên bằng cấp" value="<?php echo $r['TENBACLUONG']; ?>" >
                        </div>
                        
                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Lương cơ bản</label>
                            <input type="number" class="form-control" name="lcb" value="<?php echo $r['LUONGCOBAN']; ?>" >
                        </div>
                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Lương tăng ca</label>
                            <input type="number" class="form-control" name="ltc" value="<?php echo $r['LUONGTANGCA']; ?>" >
                        </div>
                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Phụ cấp</label>
                            <input type="number" class="form-control" name="phucap" value="<?php echo $r['PHUCAP']; ?>" >
                        </div>
                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Hỗ trợ</label>
                            <input type="number" class="form-control" name="hotro" value="<?php echo $r['HOTRO']; ?>" >
                        </div>
                        
                        <button type="submit" id="thembangcap" class="btn btn-primary"><i class="fa fa-plus"
                                aria-hidden="true"></i>
                            Lưu lại chỉnh sửa bậc lương</button>
                    </form>




                </div>
            </div>
        </div>
    </div>
</div>


<?php include('../footer.php'); ?>