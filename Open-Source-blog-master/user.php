<?php
require 'database.php';
session_start();
ob_start();

print_r($_SESSION);
?>