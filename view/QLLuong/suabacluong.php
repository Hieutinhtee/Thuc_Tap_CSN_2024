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


                    <form action="xulisuabacluong.php?suaid=<?php echo $r['MABACLUONG']; ?>" method="post"
                        class="needs-validation" novalidate>

                        <div class="mb-1">
                            <label for="degreeName" class="form-label">Tên bậc lương: </label>
                            <input name="tenbacluong" type="text" class="form-control" id="tenbacluong"
                                placeholder="Nhập tên bằng cấp" value="<?php echo $r['TENBACLUONG']; ?>">
                        </div>

                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Lương cơ sở</label>
                            <input type="text" value="<?php echo $r['LUONGCOBAN']; ?>" class="form-control money-input" name="lcb">
                        </div>
                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Phụ cấp thâm niên</label>
                            <input type="text" class="form-control money-input" value="<?php echo $r['PHUCAP']; ?>" name="phucap">
                        </div>
                        
                        <div class="mb-1">
                            <label for="ngayCong" class="form-label">Thâm niên yêu cầu</label>
                            <input type="text" class="form-control" value="<?php echo $r['THAMNIEN']; ?>" name="thamnien">
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