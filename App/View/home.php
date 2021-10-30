<?= extend('/layout/head.php') ?>
<?php
// use App\System\Session;

// $ss = new Session();
// d($ss->getFlash('succes'));
if (!empty($_SESSION)) {
    echo $_SESSION["user"];
    echo $_SESSION["login"];
    d($_SESSION);
}
// session_destroy();
?>
<h1>home</h1>
<?= !empty($var) ? $var : '' ?>
<?= extend('/layout/footer.php') ?>