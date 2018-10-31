<?php include '../parts/constructor/block/block_base_start.php' ?>
    <h5 class="card-header">Текстовый блок
    <button class="btn btn-danger btn-sm float-right" onclick="removeBlock(this);">X</button>
    </h5>
    <div class="card-body">
        <div class="form-group content-group">
            <textarea class="form-control content-data" rows="3" data-content-type="text-content"><?php echo $content['text-content'] ?></textarea>
        </div>
        
    </div>
<?php include '../parts/constructor/block/block_base_end.php' ?>
