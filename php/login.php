<?php
$logowanie = true;
include "header.php";
if(isset($_POST['login']) && isset($_POST['password'])){
    $result = mysqli_query($link, "SELECT * FROM users WHERE `username`='".$_POST['login']."' AND `password`='".md5($_POST['password'])."' ");
    if($result && mysqli_num_rows($result)>0){
        $user = mysqli_fetch_array($result);
        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_login']=$user['username'];
        header("Location: index.php");
        die();
    } else {
        $errors = "Błędny login lub hasło";
    }
}
?>
<h2>Logowanie!</h2>
<?php if(isset($errors)){ ?><div class="alert danger"><?=$errors?></div><?php } ?>
<form method="post" action="login.php">
    <table>
        <tr>
            <td>Login:</td>
            <td><input type="text" name="login"/></td>
        </tr>
        <tr>
            <td>Hasło:</td>
            <td><input type="password" name="password"/></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit">Zaloguj</button></td>
        </tr>
    </table>
</form>
<?php
include "footer.php";
?>