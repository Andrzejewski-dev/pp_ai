<?php
include "header.php";
$noteSQL = mysqli_query($link, "SELECT * FROM notes WHERE `id`=".$_GET['id']."  AND `id_user`=".$user['id']." ORDER BY id DESC");
if(!$noteSQL || mysqli_num_rows($noteSQL)==0){
    $_SESSION['alert']="Nie odnaleziono takiej notatki!";
    header("Location: index.php");
    die();
}
$note = mysqli_fetch_array($noteSQL);

?>
<h2><?=$note['temat']?></h2>
<?=$note['tresc']?>
<?php
include "footer.php";
?>