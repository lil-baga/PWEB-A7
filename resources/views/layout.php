<?php $title = $title; ?>    
<?php
ob_start();
include '/resources/css/style.css';
$style = ob_get_clean();
?>
<?php include_once 'resources/views/Layout/navbar.php'; ?>

<?php
if (isset($url)) {
    include_once $url . '.php';
}
?>

<?php include_once 'resources/views/Layout/navbar.php'; ?>