<?php include('menu.php'); ?>
<div class="row">
  <div class="col-12 d-flex">
    <div class="card border-0">
      <div class="card-header">
        <h5 class="card-title">Danh sách kế hoạc công tác</h5>
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
        <action-table>
          <action-table-filters>
            <div class="flex flex-col">
              <div>
                <!-- Search Field -->
                <div class="input-group mb-3 col-5">
                  <button class="btn btn-primary" type="button" id="button-addon1">Tìm kiếm</button>
                  <input class="form-control " aria-describedby="basic-addon1" id="action-table-search"
                    name="action-table" type="search" placeholder="Search">
                </div>
              </div>
            </div>
          </action-table-filters>
          <table class="table table-hover text-center">
            <thead class="table-warning">
              <tr>
                <th style="text-align: center;">STT</th>
                <th style="text-align: center;">Ngày bắt đầu</th>
                <th style="text-align: center;">Ngày kết thúc</th>
                <th style="text-align: center;">Địa điểm</th>
                <th style="text-align: center;">Mục đích</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              require_once '../connect.php';
              $stmt = $conn->prepare("SELECT * FROM CONGTAC WHERE MANV=$id");
              $stmt->execute();
              $stt = 0;
              foreach ($stmt->fetchAll() as $r) {
                ?>
                <tr>
                  <th><?php echo $stt += 1; ?></th>
                  <td><?php echo $r['NGAYBATDAU']; ?></td>
                  <td><?php echo $r['NGAYKETTHUC']; ?></td>
                  <td><?php echo $r['DIADIEM']; ?></td>

                  <td><?php echo $r['MUCDICH']; ?></td>
                  
                </tr>
                <?php
              }
              ?>

            </tbody>
          </table>
        </action-table>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>