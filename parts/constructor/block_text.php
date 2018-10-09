<?php include '../parts/constructor/block_base_start.php' ?>
    <h5 class="card-header">Текстовый блок 
        <button class="btn btn-danger btn-sm" onclick="removeBlock(this);">Удалить блок</button>
    </h5>
    <div class="card-body">
        <textarea class="form-control content-data" rows="3" data-content-type="text-content"><?php echo $content['text-content'] ?></textarea>
    </div>
<?php include '../parts/constructor/block_base_end.php' ?>
