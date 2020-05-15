<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "ai");
if(!$link){
    printf("Strona tymczasowo wyłączona!");
    exit();
}
if(isset($_SESSION['user_id']) && $_SESSION['user_id']){
    $result = mysqli_query($link, "SELECT * FROM users WHERE `id`='".$_SESSION['user_id']."' ");
    if($result && mysqli_num_rows($result)>0){
        $user = mysqli_fetch_array($result);
    } else {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
    }
}
if(!isset($logowanie) && (!isset($_SESSION['user_id']) || !$_SESSION['user_id'] || !isset($user))){
    header("Location: login.php");
    die();
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>PHP</title>
</head>
<body>
<?php if(isset($user)){ ?>Witaj <?=$user['username']?>!<br/>
<a href="index.php">Home</a> -
<a href="addNote.php">Dodaj notatkę</a> -
<a href="changePassword.php">Zmień hasło</a> -
<a href="logout.php">Wyloguj</a><br/><br/>
<?php } ?>
<?php if(isset($_SESSION['alert'])){ ?><div class="alert success"><?=$_SESSION['alert']?></div><?php unset($_SESSION['alert']); } ?>
