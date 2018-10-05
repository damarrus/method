<?php

include ('../db.php');
include ('../parts/func.php');

$manual_id = mysqli_real_escape_string($link, $_GET['id']);

$query = "SELECT * FROM manuals WHERE manual_id=$manual_id";
$result = mysqli_query($link, $query);
$manual = mysqli_fetch_assoc($result);

include ('../templates/header.php');
?>

<h1><?php echo $manual['name'] ?></h1>
<p><?php echo $manual['description'] ?></p>

<form action="/handlers/add_section.php" id="add" method="POST">
    Новый раздел <input type="text" name="name">
    <input type="hidden" name="description" value="Описание раздела">
    <input type="hidden" name="manual_id" value="<?php echo $manual_id ?>">
    <input type="hidden" name="parent_id" value="0">
    <input type="submit" value="Добавить">
</form>

<?php 


$sections = getSections($link, $manual_id);

echo '<div id="sections" data-manual-id="'.$manual_id.'" data-section-id="0">';
printSections($sections);
echo '</div>';

//dump($sections);





?>

<button id="save-sections">Сохранить разделы</button>

<script src="../scripts/sections.js"></script>

<?php include ('../templates/footer.php'); ?>