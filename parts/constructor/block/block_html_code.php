<?php include '../parts/constructor/block/block_base_start.php' ?>
    <h5 class="card-header">HTML-код</h5>
    <div class="card-body">
        <div class="form-group content-group">
            <textarea class="form-control content-data mono" rows="3" data-content-type="code-content"><?php echo $content['code-content'] ?></textarea>
        </div>
        <div class="form-group content-group">
            Комментарий 
            <input 
                class="content-data" 
                type="checkbox" 
                onchange="toggleComment(this);" 
                data-content-type="comment"
                <?php echo ($content['comment'] ? 'checked' : '') ?>
            >
            <textarea 
                class="form-control content-data" rows="3" 
                data-content-type="comment-content"
                <?php echo ($content['comment'] ? '' : ' style="display: none;"') ?>
            ><?php echo $content['comment-content'] ?></textarea>
        </div>
        <div class="form-group content-group">
            Результат 
            <input 
                class="content-data" 
                type="checkbox" 
                onchange="toggleResult(this);"
                data-content-type="result" 
                <?php echo ($content['result'] ? 'checked' : '') ?>
            >
            <textarea 
                class="form-control content-data mono" rows="3" 
                data-content-type="result-content"
                <?php echo ($content['result'] ? '' : ' style="display: none;"') ?>
            ><?php echo $content['result-content'] ?></textarea>
        </div>
        <button class="btn btn-danger btn-sm" onclick="removeBlock(this);">Удалить блок</button>
    </div>
<?php include '../parts/constructor/block/block_base_end.php' ?>
