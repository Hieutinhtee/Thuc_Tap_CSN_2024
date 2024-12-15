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
<?php
if (isset($_SESSION["toast"])) {
    if ($_SESSION["toast"] == "oke") {
       
        $_SESSION["toast"]="no";
        ?>
        <script src="../js/toast.js?1"></script>
        <?php
    }
    
}
?>

</html>