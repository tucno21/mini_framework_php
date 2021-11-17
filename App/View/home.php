<?= extend('/layout/head.php') ?>

<?php
// d($_SESSION);
?>

<h1>home</h1>
<?= !empty($var) ? $var : '' ?>
<?= extend('/layout/footer.php') ?>