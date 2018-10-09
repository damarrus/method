let process = false;

$(document).ready(function() {
    setSortable($(".sortable"));

    function setSortable(object) {
        object.sortable({
            placeholder: "ui-state-highlight",
            connectWith: ".sortable",
            items: "li:not(.ui-state-disabled)",
            update: function( event, ui ) {
                if (process) {
                    return false;
                } else {
                    process = true;
                }
                let sections = $('.section');
                let data = {
                    manual_id: $('#sections').data('manual-id'),
                    sections: []
                };
        
                sections.each(function() {
                    let parent = $(this).parent().parent();
                    let parent_id = parent.data('section-id');
                    let section_id = $(this).data('section-id');
                    let name = $(this).children('span').text();
                    
                    for (var level = 0; parent.attr('id') != 'sections'; level++) {
                        parent = parent.parent().parent();
                    }
        
                    let position = 0;
                    data.sections.forEach(function(section) {
                        if (section.level == level) {
                            position = section.position + 1;
                        }
                    });
        
                    data.sections.push({
                        section_id: section_id, 
                        parent_id: parent_id, 
                        position: position,
                        name: name, 
                        level: level
                    });
                });
        
                $.post( "../handlers/constructor/section/update_sections_position.php", data, function(response) {
                    process = false;
                    if (response == 1) {
                        console.log('sort update');
                    } else {
                        alert(response);
                    }
                });
            }
        }).disableSelection();
    }

    $('#add-section').submit(function() {
        if (process) {
            return false;
        } else {
            process = true;
        }

        let field = $('#add-section-name');
        let data = {
            manual_id: $('#sections').data('manual-id'),
            name: field.val(),
            position: $('#sections > ul > li').length
        };
        
        $.post( "../handlers/constructor/section/add_section.php", data, function(response) {
            process = false;
            if (response) {
                let field = $('#add-section-name');
                $('#sections > ul').append(
                    '<li class="section" data-section-id="'+response+'">' +
                        '<span>' + field.val() + '<a href="#" class="delete-section" onclick="deleteSection(this);return false;">удалить раздел</a></span>' +
                        '<ul class="sortable"></ul>' +
                    '</li>'
                );
                setSortable($('#sections > ul > li:last-child > ul'));
                field.val('');
            } else {
                alert(response);
            }
        });
        return false;
    });

    $('.delete-section').click(function() {
        deleteSection(this);
        return false;
    });

    
});

function deleteSection(self) {
    if (process) {
        return false;
    } else {
        process = true;
    }
    let section = $(self).parent().parent();
    let data = {section_id: section.data('section-id')};
    $.post( "../handlers/constructor/section/delete_section.php", data, function(response) {
        process = false;
        if (response == 1) {
            section.remove();
        } else {
            alert('Ошибка удаления');
        }
    });
}