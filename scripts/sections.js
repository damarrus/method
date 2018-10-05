$(document).ready(function() {
    // Сохранение позиций разделов
    $('#save-sections').click(function() {
        let sections = $('.section');
        let data = {
            sections: []
        };

        sections.each(function() {
            let parent = $(this).parent().parent();
            let parent_id = parent.data('section-id');
            let section_id = $(this).data('section-id');
            
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
                level: level
            });
        });

        $.post( "../handlers/update_sections.php", data, function(response) {
            if (response == 1) {
                alert('Разделы успешно сохранены');
            } else {
                alert(response);
            }
        });
    });
});