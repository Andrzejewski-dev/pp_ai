<?php
include "header.php";
$noteSQL = mysqli_query($link, "SELECT * FROM notes WHERE `id`=".$_GET['id']."  AND `id_user`=".$user['id']." ORDER BY id DESC");
if(!$noteSQL || mysqli_num_rows($noteSQL)==0){
    $_SESSION['alert']="Nie odnaleziono takiej notatki!";
    header("Location: index.php");
    die();
}
$note = mysqli_fetch_array($noteSQL);

if(isset($_POST['temat']) && isset($_POST['tresc'])){
    mysqli_query($link, " UPDATE `notes` SET 
                         `temat`='".$_POST['temat']."',
                         `tresc`='".$_POST['tresc']."',
                         `data_edycji`=NOW() 
                         WHERE `id`='".$note['id']."'");
    var_dump(mysqli_error($link));
    $_SESSION['alert']="Pomyślnie przeedytowano notatkę!";
    header("Location: index.php");
    die();
}
?>
<h2>Edytuj notatkę</h2>
<?php if(isset($errors)){ ?><div class="alert danger"><?=$errors?></div><?php } ?>
    <form method="post">
        <table>
            <tr>
                <td>Temat:</td>
                <td><input type="text" name="temat" value="<?=$note['temat']?>"/></td>
            </tr>
            <tr>
                <td>Treść:</td>
                <td><textarea rows="5" cols="15" name="tresc"><?=$note['tresc']?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Edytuj</button></td>
            </tr>
        </table>
    </form>
<?php
include "footer.php";
?>