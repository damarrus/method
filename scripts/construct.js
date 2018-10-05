$(document).ready(function() {
    let construct = $('#construct');

    $('#save-blocks').click(function() {
        let blocks = construct.children('.block');
        let data = {
            section_id: 4,
            blocks: []
        };
        blocks.each(function() {
            switch($(this).data('block-type-id')) {
                case 1:
                    let text = $(this).find('textarea').val();
                    data.blocks.push({text: text});
            }
        });
        console.log(data.blocks);

        $.post( "../handlers/update_blocks.php", data, function(response) {
            if (response == 1) {
                alert('Блоки успешно сохранены');
            } else {
                alert(response);
            }
        });
    });

    $('#add-text-block').click(function() {
        construct.append(
            '<div class="card block block-text" data-block-type-id="1">' +
                '<h5 class="card-header">Текстовый блок <button class="btn btn-danger btn-sm" onclick="removeBlock(this);">Удалить блок</button></h5>' +
                '<div class="card-body">' +
                    '<textarea class="form-control" rows="3"></textarea>' +
                '</div>' +
            '</div>'
        );
    });

    construct.append(
        '<div class="card block block-text" data-block-type-id="1">' +
            '<h5 class="card-header">Текстовый блок <button class="btn btn-danger btn-sm" onclick="removeBlock(this);">Удалить блок</button></h5>' +
            '<div class="card-body">' +
                '<textarea class="form-control" rows="3"></textarea>' +
            '</div>' +
        '</div>'
    );
    construct.append(
        '<div class="card block block-text" data-block-type-id="1">' +
            '<h5 class="card-header">Текстовый блок <button class="btn btn-danger btn-sm" onclick="removeBlock(this);">Удалить блок</button></h5>' +
            '<div class="card-body">' +
                '<textarea class="form-control" rows="3"></textarea>' +
            '</div>' +
        '</div>'
    );
});

function removeBlock(button) {
    $(button).parent().parent().remove();
}