<?php

// Рекурсивная функция для получения структуры и информации по разделам методички (всех уровней)
function getSections($link, $manual_id, $parent_id = 0) {

    $query = "SELECT * FROM sections WHERE manual_id=$manual_id && parent_id".($parent_id == 0 ? " IS NULL" : "=$parent_id")." ORDER BY position";
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

// Рекурсивная функция для вывода структуры разделов методички
function printSections($sections, $first = true) {
    echo '<ul class="sortable section-list">';
    foreach ($sections as $section) {
        echo '<li class="section" data-section-id="'.$section['section_id'].'">';
        echo 
        '<span>'.$section['name'].'
            <a href="section.php?id='.$section['section_id'].'">редактировать</a><a href="/" class="delete-section">удалить раздел</a> 
        </span>'; // <a href="section_info.php?id='.$section['section_id'].'">редактировать</a>
        if (isset($section['sections'])) {
            printSections($section['sections'], false);
        } else {
            echo '<ul class="sortable section-list"></ul>';
        }
        echo '</li>';
    }
    // echo '<li class="ui-state-default">';
    // printFormAddSection($section['manual_id'], $section['parent_id']);
    // echo "</li>";
    //echo '<li class="ui-state-default ui-state-disabled" style="list-style-type: none;"><br></li>';
    echo "</ul>";
    if ($first) {
        echo 
        '<form id="add-section" class="form-inline">
            <div class="form-group mb-3" style="margin-left: 0!important; margin-right: 5px!important;">
                <input id="add-section-name" type="text" class="form-control form-control-sm" placeholder="Новый раздел" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm mb-3">Добавить</button>
        </form>';
    }
}

function printViewSections($sections, $level = 2) {
    foreach ($sections as $section) {
        echo "<h$level>{$section['name']}</h$level>";
        if (isset($section['sections'])) {
            printViewSections($section['sections'], ++$level);
        }
    }
}

define('BLOCK_TEXT', 1);
define('BLOCK_HEADER', 2);
define('BLOCK_HTML_CODE', 3);

function printBlock($type, $block_id, $content = []) {
    switch ($type) {
        case BLOCK_TEXT: $class = 'text'; include '../parts/constructor/block/block_text.php'; break;
        case BLOCK_HEADER: $class = 'header'; include '../parts/constructor/block/block_header.php'; break;
        case BLOCK_HTML_CODE: $class = 'html-code'; include '../parts/constructor/block/block_html_code.php'; break;
        default: echo false;
    }
}