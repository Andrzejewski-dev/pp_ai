<?php
include "header.php";

$notesSQL = mysqli_query($link, "SELECT * FROM notes WHERE `id_user`=".$user['id']." ORDER BY data_dodania DESC");

?>
<table>
    <thead>
        <tr>
            <td>Temat</td>
            <td>Data modyfikacji</td>
            <td colspan="3">Akcje</td>
        </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_array($notesSQL)){ ?>
        <tr>
            <td><?=$row['temat']?></td>
            <td><?=$row['data_edycji']?:$row['data_dodania']?></td>
            <td><a href="showNote.php?id=<?=$row['id']?>">Podgląd</a></td>
            <td><a href="editNote.php?id=<?=$row['id']?>">Edytuj</a></td>
            <td><a href="removeNote.php?id=<?=$row['id']?>">Usuń</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php
include "footer.php";
?>