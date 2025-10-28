</main>
<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    <a href="#" class="text-muted">
                        <strong>Công ty HHHH</strong>
                    </a>
                </p>
            </div>
            <div class="col-6 text-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#" class="text-muted">Contact</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-muted">About Us</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-muted">Terms</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="text-muted">Booking</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- Scripts -->

<script>

    (function () {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.from(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
<script>
    // Lấy tất cả các ô có class "money"
    const moneyCells = document.querySelectorAll('.money');

    // Lặp qua từng ô và định dạng số tiền
    moneyCells.forEach(cell => {
        const amount = parseFloat(cell.textContent); // Lấy giá trị số từ ô
        if (!isNaN(amount)) {
            cell.textContent = amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }); // Định dạng tiền tệ
        }
    });
</script>
<script>
    // Lấy tất cả các ô input có class "money-input"
    const moneyInputs = document.querySelectorAll('.money-input');

    // Hàm định dạng số với dấu phẩy
    function formatMoney(value) {
        return value.replace(/\D/g, '') // Loại bỏ ký tự không phải số
            .replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Thêm dấu phẩy
    }

    // Hàm xóa định dạng (trả về số thô)
    function unformatMoney(value) {
        return value.replace(/,/g, ''); // Loại bỏ dấu phẩy
    }

    // Lắng nghe sự kiện "input" và "blur" trên các ô input
    moneyInputs.forEach(input => {
        // Thêm dấu phẩy khi nhập
        input.addEventListener('input', function () {
            const cursorPosition = this.selectionStart; // Lưu vị trí con trỏ
            this.value = formatMoney(this.value); // Định dạng số
        });

        // Xóa định dạng khi rời khỏi ô
        input.addEventListener('blur', function () {
            this.value = unformatMoney(this.value); // Trả về số thô
        });

        // Khôi phục định dạng khi người dùng quay lại ô
        input.addEventListener('focus', function () {
            this.value = formatMoney(this.value); // Định dạng lại số
        });
    });
</script>
<?php
if (isset($_SESSION["toast"])) {
    if ($_SESSION["toast"] == "oke") {

        $_SESSION["toast"] = "no";
        ?>
        <script src="../js/toast.js?<?php echo $timestamp?>"></script>
        <?php
    }

}
?>

</html>
<!-- xSuAbHsBTSP -->