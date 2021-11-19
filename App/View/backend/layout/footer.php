<?php
include 'MainDashboard.php';
?>
<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                copyright
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>

<?php foreach ($linksScript as $value) : ?>
    <script src="<?= $value ?>"></script>
<?php endforeach; ?>

</body>

</html>