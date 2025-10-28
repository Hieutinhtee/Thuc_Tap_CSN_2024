<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Công ty HHHH</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet'
		href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
	<link rel="stylesheet" href="style.css?1">

</head>

<body>

	<div class="screen-1" style="box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.3);">
		<img src="logoHHH.jpg" style="width: 300px; margin-bottom: 50px; border-radius: 25px;" alt="Logo công ty HHHH">



		<form action="#" method="POST">
			<div class="email login1 mb-4">
				<label for="email"><strong>Tên đăng nhập</strong></label>
				<div class="sec-2 ">
					<ion-icon name="person-outline"></ion-icon>
					<input id="input1" type="" name="username" placeholder="············" />
				</div>
			</div>
			<div class="password login1 mb-1">
				<label for="password"><strong>Mật khẩu</strong></label>
				<div class="sec-2">
					<ion-icon name="lock-closed-outline"></ion-icon>
					<input id="input2" type="password" name="password" placeholder="············" />
				</div>
			</div>
			<?php
			session_start();
			if (isset($_SESSION["dangnhap"])) {
				if ($_SESSION["dangnhap"] == '0') {
					header("location:../NhanVien");
				}
				if ($_SESSION["dangnhap"] == '1') {
					header("location:../TongQuan");
				}
			}
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$username = $_POST["username"];
				$user_input = $_POST["password"];

				require_once '../connect.php';
				$sql = "SELECT * FROM NHANVIEN WHERE TENTAIKHOAN='" . $username . "' ";

				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$row1 = $stmt->fetch(PDO::FETCH_ASSOC);
				$stored_hash = $row1['MATKHAU'];
				$row = password_verify($user_input, $stored_hash);
				if (!$row) {
					echo '<div id="loi"><label style="color: red;" class="d-flex justify-content-center">Sai tên tài khoản hoặc mật khẩu!!!</label></div>
					<script>
						const input1 = document.getElementById("input1");
						const input2 = document.getElementById("input2");
						const divToHide = document.getElementById("loi");

						function hideDiv() {
							if (input1.value || input2.value) {
								divToHide.style.display = "none";
							}
						}

						input1.addEventListener("input", hideDiv);
						input2.addEventListener("input", hideDiv);
					</script>';
				}
				if ($row) {
					$_SESSION['manv'] = $row1['MANV'];
					$_SESSION['tennv'] = $row1['TENNV'];
					$_SESSION["username"] = $username;
					if ($row1["QUYENHAN"] == "Nhân viên") {

						$_SESSION["dangnhap"] = '0';
						header("location:../NhanVien");
					} elseif ($row1["QUYENHAN"] == "Quản trị viên") {

						$_SESSION["dangnhap"] = '1';
						header("location:../TongQuan");
					}
				}
			}
			?>

			<div class="container mt-4">
				<button type="submit" class="btn-epic d-flex justify-content-center" href="">
					<div class="d-flex justify-content-center"><span>Đăng nhập</span><span>Đăng nhập</span></div>
				</button>
			</div>

		</form>
	</div>

</body>

</html>