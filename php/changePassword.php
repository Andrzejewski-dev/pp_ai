<?php
include "header.php";
if(isset($_POST['password2']) && isset($_POST['password'])){
    if($_POST['password']!=$_POST['password2']){
        $errors="Hasła muszą do siebie pasować!";
    } else {
        mysqli_query($link, "UPDATE users SET `password`='".md5($_POST['password'])."' WHERE `id`='".$user['id']."'");
        $_SESSION['alert']="Pomyślnie zmieniono hasło!";
        header("Location: index.php");
        die();
    }
}
?>
<h2>Zmień hasło</h2>
<?php if(isset($errors)){ ?><div class="alert danger"><?=$errors?></div><?php } ?>
    <form method="post" action="changePassword.php">
        <table>
            <tr>
                <td>Hasło:</td>
                <td><input type="password" name="password"/></td>
            </tr>
            <tr>
                <td>Powtórz hasło:</td>
                <td><input type="password" name="password2"/></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Zaloguj</button></td>
            </tr>
        </table>
    </form>
<?php
include "footer.php";
?>