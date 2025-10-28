<?php include('../menu.php'); ?>
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


          <form action="thembangcap.php" method="post" class="needs-validation" novalidate>

            <div class="mb-3">
              <label for="degreeName" class="form-label">Tên bằng cấp: </label>
              <input name="tenbangcap" type="text" class="form-control" id="tenbangcap" placeholder="Nhập tên bằng cấp" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label"><strong>Mô tả:</strong></label>
              <input name="motabangcap" id="motabangcap" class="form-control" placeholder="Nhập mô tả..."></input>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label"><strong>Hệ số lương:</strong></label>
              <input type="number" step="0.01" name="hsl" class="form-control" placeholder="Nhập hệ số lương..." required></input>
            </div>
            <div class="mb-3">
              <label for="position" class="form-label"><strong>Người tạo, chỉnh sửa</strong></label>
              <input type="text" id="position" class="form-control bg-secondary-subtle" value="Admin" readonly>
            </div>
            <div class="mb-3">
              <label for="dateCreat" class="form-label"><strong>Ngày tạo</strong></label>
              <input name="ngaytaobangcap" id="ngaytao" class="form-control bg-secondary-subtle" value="<?php echo date('d-m-Y'); ?>"
                readonly>
            </div>
            <button type="submit" id="thembangcap" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
              Thêm bằng cấp</button>
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
        <h5 class="card-title">Danh sách bằng cấp</h5>
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
              <th scope="col">Tên bằng cấp</th>
              <th scope="col">Mô tả</th>   
              <th scope="col">Hệ số lương theo bằng cấp</th>           
              <th scope="col">Người tạo, sửa</th>    
              <th scope="col">Ngày tạo, sửa</th>                    
              <th scope="col">Sửa</th>
              <th scope="col">Xóa</th>
            </tr>
          </thead>
          <tbody>
          <?php
                    require_once '../connect.php';
                    $stmt = $conn->prepare("SELECT * FROM BANGCAP");
                    $stmt->execute();
                    $stt = 0;
                    foreach ($stmt->fetchAll() as $r) {
                      ?>
                      <tr>
                        <th><?php echo $stt += 1; ?></th>
                        
                        <td><?php echo $r['TENBANGCAP']; ?></td>
                        
                        <td class="limited-width"><?php echo $r['MOTABANGCAP']; ?></td>
                        <td><?php echo $r['HESOLUONG']; ?></td>
                        <td>Admin</td>
                        <td><?php echo $r['NGAYTAO']; ?></td>

                        <td><a href="suabangcap.php?xid=<?php echo $r['MABANGCAP']; ?>" class="btn btn-outline-primary"><i class="fa fa-solid fa-pencil"
                              aria-hidden="true"></i>
                          </a></td>
                        <td><a onclick="return confirm('Xác nhận xóa');" href="xoabangcap.php?xid=<?php echo $r['MABANGCAP']; ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash" aria-hidden="true"></i>
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

<?php include('../footer.php'); ?>