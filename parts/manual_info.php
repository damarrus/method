<?php

$manual_id = mysqli_real_escape_string($link, $_GET['id']);

$query = "SELECT * FROM manuals WHERE manual_id=$manual_id";
$result = mysqli_query($link, $query);
$manual = mysqli_fetch_assoc($result);

$sections = getSections($link, $manual_id);
$sections = $sections ? $sections : [];
?>

<a href="manuals.php">Вернуться ко всем методичкам</a>
<h1>Редактирование методички: <?php echo $manual['name'] ?></h1>
<div class="card">
    <h2 class="card-header">Основная информация</h2>
    <div class="card-body">
        <form action="../handlers/update_manual.php" method="POST">
            Название <input class="form-control" type="text" name="name" value="<?php echo $manual['name'] ?>">
            Описание <textarea class="form-control" name="description"><?php echo $manual['description'] ?></textarea>
            <input type="hidden" name="manual_id" value="<?php echo $manual_id ?>"><br>
            <input class="btn btn-success" type="submit" value="Сохранить основную информацию">
        </form>
    </div>
</div>
<br>
<div class="card">
    <h2 class="card-header">Разделы (auto-save)</h2>
    <div class="card-body">
        <div id="sections" data-manual-id="<?php echo $manual_id ?>" data-section-id="0">
            <?php printSections($sections) ?>
        </div>
    </div>
</div>
<br>
<div class="card">
    <h2 class="card-header">Удаление методички</h2>
    <div class="card-body">
        <form action="../handlers/delete_manual.php" method="POST">
            <input type="hidden" name="manual_id" value="<?php echo $manual_id ?>"><br>
            <input class="btn btn-danger" type="submit" value="Удалить методичку">
        </form>
    </div>
</div>
<br>

<script src="../scripts/sections.js"></script>
