<form action="/handlers/constructor/section/add_section.php" id="add" method="POST">
    Новый раздел <input type="text" name="name">
    <input type="hidden" name="description" value="Описание раздела">
    <input type="hidden" name="manual_id" value="<?php echo $manual_id ?>">
    <input type="hidden" name="parent_id" value="<?php echo $parent_id ?>">
    <input type="submit" value="Добавить">
</form>