<?php
session_start();
session_destroy();
header("Location:/abcjobs/public/login.php");
?>