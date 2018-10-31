<?php

$section_id = mysqli_real_escape_string($link, $_GET['id']);

// Достаем информацию о разделе
$query = "SELECT * FROM sections WHERE section_id=$section_id";
$result = mysqli_query($link, $query);
$section = mysqli_fetch_assoc($result);

// Достаем информацию о блоках в разделе
$query = "SELECT * FROM blocks WHERE section_id=$section_id";
$result = mysqli_query($link, $query);
$blocks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<a href="manual.php?id=<?php echo $section['manual_id'] ?>">Вернуться ко всем разделам</a>

<div id="section" data-section-id="<?php echo $section_id ?>" class="card">
    <h4 class="card-header">Информация о разделе</h4>
    <div class="card-body">
        <form action="../handlers/update_section.php" method="POST">
            Заголовок <input type="text" name="name" class="form-control" value="<?php echo $section['name'] ?>">
            Описание <textarea type="text" name="description" class="form-control"><?php echo $section['description'] ?></textarea>
            <input type="hidden" name="section_id" value="<?php echo $section_id ?>"><br>
            <input class="btn btn-success" type="submit" value="Сохранить основную информацию">
        </form>
    </div>
</div>

<div id="construct-panel" class="card">
    <h5 class="card-header">Добавить блоки</h5>
    <div class="card-body">
        <button class="btn btn-secondary add-block" id="add-block-text" data-block-type-id="1"><span class="badge badge-success">+</span> Текстовый блок</button>
        <button class="btn btn-secondary add-block" id="add-block-html-code" data-block-type-id="3"><span class="badge badge-success">+</span> HTML-блок</button>
    </div>
    <div class="card-footer">
        <button class="btn btn-success" id="save-blocks">Сохранить</button>
    </div>
</div>

<div id="construct">
    <ul class="sortable block-list">
        <?php 
            foreach ($blocks as $block) {
                printBlock($block['block_type_id'], $block['block_id'], unserialize($block['content']));
            }
        ?>
    </ul>
</ul>

<script src="../scripts/constructor/construct.js"></script>
