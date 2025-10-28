<?php
session_start();
require_once '../connect.php';
$ngayxuat = date("Y-m-d H:i:s");
if (isset($_POST["xuat_dsnv"])) {
  $output = '';
  $stmt = $conn->prepare("SELECT * FROM NHANVIEN WHERE QUYENHAN='Nhân viên'");
  $stmt->execute();
  $stt = 0;
  $output .= '
                <table>
                <thead class="table-info">
                  <tr>
                  <th>STT</th>
                    <th>Mã nhân viên</th>
                    <th>Tên nhân viên</th>
                    <th>CMND</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Chức vụ</th>
                    <th>Ngày vào làm</th>
                    <th>Mã phòng ban</th>
                    <th>Bằng cấp</th>
                    
                  </tr>
                </thead>
                <tbody>
        ';
  foreach ($stmt->fetchAll() as $r) {
    $stt += 1;
    $output .= '
        <tr>
        <td>' . $stt . '</td>  
            <td>' . $r['MANV'] . '</td>  
            <td>' . $r['TENNV'] . '</td> 
            <td>' . "'" . $r['CMND'] . '</td> 
            <td>' . $r['DIACHI'] . '</td>  
            <td>' . "'" . $r['SDT'] . '</td>  
            <td>' . $r['EMAIL'] . '</td>
            <td>' . $r['CHUCVU'] . '</td>
            <td>' . $r['NGAYVAOLAM'] . '</td>
            <td>' . $r['MAPHONGBAN'] . '</td>
            <td>' . $r['BANGCAP'] . '</td>
        </tr>
        ';
  }
  $output .= '
    </tbody>
    </table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Danh_sách_nhân_viên_' . $ngayxuat . '.xls');
  echo $output;
  exit;
}

if (isset($_POST["xuat_dsluong"])) {
  $output = '';
  $stmt = $conn->prepare("SELECT * FROM CHAMCONG");
  $stmt->execute();
  $stt = 0;
  $output .= '
                <table>
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã nhân viên</th>
                    <th>Tên nhân viên</th>
                    <th>Thời gian</th>
                    <th>Số giờ làm</th>
                    <th>Số giờ tăng ca</th>
                    <th>Vi phạm</th>
                    <th>Thưởng</th>
                    <th>Phụ cấp, hỗ trợ</th>
                    <th>Thực lĩnh</th>
                  </tr>
                </thead>
                <tbody>
        ';
  foreach ($stmt->fetchAll() as $r) {
    $stt += 1;
    $output .= '
        <tr>
            <td>' . $stt . '</td>  
            <td>' . $r['MANV'] . '</td>  
            <td>' . $r['TENNV'] . '</td> 
            <td>' . $r['THOIGIAN'] . '</td> 
            <td>' . $r['SOGIOLAM'] . '</td>  
            <td>' . $r['SOGIOTANGCA'] . '</td>  
            <td>' . $r['TIENVIPHAM'] . '</td>
            <td>' . $r['THUONG'] . '</td>
            <td>' . $r['PHUCAPHOTRO'] . '</td>
            <td>' . $r['THUCLINH'] . '</td>

        </tr>
        ';
  }
  $output .= '
    </tbody>
    </table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Danh_sách_lương' . $ngayxuat . '.xls');
  echo $output;
  exit;
}

if (isset($_POST["xuat_dscongtac"])) {
  $output = '';
  $stmt = $conn->prepare("SELECT * FROM CONGTAC");
  $stmt->execute();
  $stt = 0;
  $output .= '
                <table>
                <thead>
                  <tr>
                    <th>STT</th>
                <th>Mã nhân viên</th>
                <th>Tên nhân viên</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Địa điểm</th>
                <th>Mục đích</th>
                  </tr>
                </thead>
                <tbody>
        ';
  foreach ($stmt->fetchAll() as $r) {
    $stt += 1;
    $output .= '
        <tr>
            <td>' . $stt . '</td>  
            <td>' . $r['MANV'] . '</td>  
            <td>' . $r['TENNV'] . '</td> 
            <td>' . $r['NGAYBATDAU'] . '</td> 
            <td>' . $r['NGAYKETTHUC'] . '</td>  
            <td>' . $r['DIADIEM'] . '</td>  
            <td>' . $r['MUCDICH'] . '</td>
        </tr>
        ';
  }
  $output .= '
    </tbody>
    </table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Danh_sách_công_tác' . $ngayxuat . '.xls');
  echo $output;
  exit;
}
$_SESSION["toast"] = "oke";
?>