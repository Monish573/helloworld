<?php
session_start();
unset($session['Email']);
header('location: login.php');
?>