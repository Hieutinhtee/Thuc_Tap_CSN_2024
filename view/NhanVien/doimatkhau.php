<?php include('menu.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md d-flex">
            <div class="card">
                <div class="card-header">
                    <h5>Đổi mật khẩu</h5>
                </div>
                <div class="card-body">
                    <form action="xulidoimatkhau.php" class="needs-validation" method="post" id="myForm" novalidate>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu cũ(*)</label>
                            <input type="password" class="form-control" name="matkhaucu" placeholder="Xác nhận mật khẩu---" required>
                            <?php
                            if (isset($_SESSION["toast"])) {
                                if ($_SESSION["toast"] == "saimk") {
                                    $_SESSION["toast"] = "no";
                                    ?>
                                    <div style="color: red;">Mật khẩu không đúng, vui lòng nhập lại!!!</div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu(*)</label>
                            <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Nhập lại mật khẩu(*)</label>
                            <input type="password" class="form-control" id="confirmPassword" name="matkhaumoi"
                                placeholder="Nhập lại mật khẩu" required>
                        </div>
                        <script>
                            const form = document.getElementById('myForm');

                            form.addEventListener('submit', (event) => {
                                event.preventDefault();

                                const password = document.getElementById('password').value;
                                const confirmPassword = document.getElementById('confirmPassword').value;

                                if (password !== confirmPassword) {
                                    alert('Mật khẩu xác nhận không trùng khớp, vui lòng nhập lại!!!');
                                    return;
                                }

                                // If passwords match, submit the form
                                form.submit();
                            });
                        </script>


                        <button type="submit" class="btn btn-primary">Lưu lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>