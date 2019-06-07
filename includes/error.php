<?php
include_once './includes/bootstrap.php';
$flashes = Session::getInstance()->getFlashes();
?>

<?php foreach ($flashes as $key => $message): ?>
    <div class="alert alert-<?= $key ?>" role="alert">
        <?= $message ?>
    </div>
<?php endforeach; ?>
