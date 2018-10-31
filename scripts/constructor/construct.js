let process = false;

$(document).ready(function() {
    let section_id = $('#section').data('section-id');

    // Добавить блок в базу и на страницу
    $('.add-block').click(function() {
        let data = {
            section_id: section_id,
            block_type_id: $(this).data('block-type-id')
        }

        $.ajax({
            url: "../handlers/add_block.php",
            method: 'POST',
            data: data,
            success: function(block){
                $('#construct > ul').append(block);
            }
        });
    });

    // Изменить контент блока
    $('.content-data').change(function() {
        let content = {};
        let block = $(this).parents('.block');
        block.find('.content-data').each(function() {
            let content_type = $(this).data('content-type');
            let content_data;

            if ($(this).attr('type') == 'checkbox') {
                content_data = $(this).prop("checked") ? 1 : 0;
            } else {
                content_data = $(this).val();
            }
            
            content[content_type] = content_data;
        });

        let data = {
            block_id: block.data('block-id'),
            content: content
        };

        block.children('.card-header').append('<img width="18" class="ajax-load" src="../images/load.gif"> ');

        $.ajax({
            url: "../handlers/update_block.php",
            method: 'POST',
            data: data,
            success: function(){
                block.find('.ajax-load').remove();
            }
        });
    });

    // Устанавливаем возможность сортировки
    $(".sortable").sortable({
        placeholder: "ui-state-highlight",
        update: function( event, ui ) {
            if (process) {
                return false;
            } else {
                process = true;
            }
            let blocks = $('.block');
            let data = {
                section_id: section_id,
                blocks: []
            };
    
            blocks.each(function(index) {
                data.blocks.push({
                    block_id: $(this).data('block-id'), 
                    position: index
                });
            });
    
            $.post( "../handlers/update_blocks_position.php", data, function(response) {
                process = false;
                if (response == 1) {
                    console.log('sort update');
                } else {
                    alert(response);
                }
            });
        }
    });//.disableSelection();
});

function removeBlock(button) {
    if (process) {
        return false;
    } else {
        process = true;
    }
    let data = {block_id: $(button).parents('.block').data('block-id')};

    $.post( "../handlers/delete_block.php", data, function(response) {
        process = false;
        if (response == 1) {
            console.log('block remove');
            $(button).parents('li').remove();
        } else {
            alert(response);
        }
    });
}

function toggleComment(input) {
    let content_group = $(input).next();
    console.log(content_group);
    if ($(input).prop("checked")) {
        content_group.show();
    } else {
        content_group.hide();
    }
}

function toggleResult(input) {
    let content_group = $(input).next();
    console.log(content_group);
    if ($(input).prop("checked")) {
        content_group.show();
    } else {
        content_group.hide();
    }
}