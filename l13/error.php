<?php
if (isset($_GET['error_message'])): ?>

<div class="alert alert-danger" role="alert">
    <?= $_GET['message'] ?? 'Server error. Please, try later' ?>
    <?= $_GET['error_message'] ?>
</div>
<?php endif; ?>

