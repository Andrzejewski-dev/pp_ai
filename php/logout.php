<?php
include "header.php";
unset($_SESSION['user_id']);
unset($_SESSION['user_login']);
header("Location: index.php");
die();