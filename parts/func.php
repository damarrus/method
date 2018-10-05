<?php

// Рекурсивная функция для получения структуры и информации по разделам методички (всех уровней)
function getSections($link, $manual_id, $parent_id = 0) {

    $query = "SELECT * FROM sections WHERE manual_id=$manual_id && parent_id=$parent_id ORDER BY position";
    $result = mysqli_query($link, $query);

    if ($result->num_rows > 0) {
        $sections = [];
        while ($section = mysqli_fetch_assoc($result)) {
            
            $sub_sections = getSections($link, $manual_id, $section['section_id']);
            if ($sub_sections !== false) {
                $section['sections'] = $sub_sections;
            }

            $sections[] = $section;
        }
    } else {
        return false;
    }

    return $sections;
}

function printSections($sections, $level = 0) {
    echo '<ul class="sortable" data-level='.$level.'>';
    foreach ($sections as $section) {
        echo '<li class="section" data-section-id="'.$section['section_id'].'">';
        echo '<span>'.$section['name'].'<a href="section_info.php?id='.$section['section_id'].'">редактировать</a><a href="#">+ подраздел</a><a href="#">удалить раздел</a></span>';
        if (isset($section['sections'])) {
            printSections($section['sections'], ++$level);
        }
        echo '<ul class="sortable" data-level='.($level+1).'></ul>';
        echo '</li>';
    }
    // echo '<li class="ui-state-default">';
    // printFormAddSection($section['manual_id'], $section['parent_id']);
    // echo "</li>";
    //echo '<li class="ui-state-default ui-state-disabled" style="list-style-type: none;"><br></li>';
    echo "</ul>";
}

function printFormAddSection($manual_id, $parent_id) {
    echo '
    <form action="/handlers/add_section.php" id="add" method="POST">
        <input type="text" name="name">
        <input type="hidden" name="description" value="Описание раздела">
        <input type="hidden" name="manual_id" value="'.$manual_id.'">
        <input type="hidden" name="parent_id" value="'.$parent_id.'">
        <input type="submit" value="Добавить">
    </form>
    ';
}