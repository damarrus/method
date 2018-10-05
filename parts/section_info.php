<?php

include ('../db.php');

$section_id = mysqli_real_escape_string($link, $_GET['id']);

$query = "SELECT * FROM sections WHERE section_id=$section_id";
$result = mysqli_query($link, $query);
$section = mysqli_fetch_assoc($result);

$query = "SELECT e.*, b.block_type_id, b.position FROM blocks b 
          JOIN elements e ON b.block_id = e.block_id 
          WHERE section_id=$section_id";
$result = mysqli_query($link, $query);
$blocks = mysqli_fetch_all($result, MYSQLI_ASSOC);

// $query = "SELECT * FROM block_types WHERE section_id=$section_id";
// $result = mysqli_query($link, $query);
// $block_types = mysqli_fetch_all($result, MYSQLI_ASSOC);

include ('../templates/header.php');

?>

<div class="card">
    <h5 class="card-header">Добавить блоки</h5>
    <div class="card-body">
        <button class="btn" id="add-text-block"><span class="badge badge-success">+</span> Текстовый блок</button>
    </div>
    <div class="card-footer">
        <button class="btn btn-success" id="save-blocks">Сохранить</button>
    </div>
</div>



<div id="construct">
    
</div>

<script src="../scripts/construct.js"></script>

<?php include ('../templates/footer.php'); ?>
