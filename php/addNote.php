<?php
include "header.php";
if(isset($_POST['temat']) && isset($_POST['tresc'])){
    mysqli_query($link, " INSERT INTO `notes`(`id`, `id_user`, `temat`, `tresc`, `data_dodania`, `data_edycji`) 
                          VALUES (NULL,".$user['id'].",'".$_POST['temat']."','".$_POST['tresc']."',NOW(),NULL)");
    var_dump(mysqli_error($link));
    $_SESSION['alert']="Pomyślnie dodano notatkę!";
    header("Location: index.php");
    die();
}
?>
<h2>Dodaj notatkę</h2>
<?php if(isset($errors)){ ?><div class="alert danger"><?=$errors?></div><?php } ?>
    <form method="post" action="addNote.php">
        <table>
            <tr>
                <td>Temat:</td>
                <td><input type="text" name="temat"/></td>
            </tr>
            <tr>
                <td>Treść:</td>
                <td><textarea rows="5" cols="15" name="tresc"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Dodaj</button></td>
            </tr>
        </table>
    </form>
<?php
include "footer.php";
?>