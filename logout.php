<?php
session_start();
session_destroy();
header('Location: Menu.php');
exit;
?>