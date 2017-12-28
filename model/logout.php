<?php session_unset(); ?>
<?php $_SESSION['notice'] = 'Logout success'; ?>
<?php header("location: ?page=home"); ?>