<?php

include ("../../../config/db.php");

foreach ($_REQUEST['sections'] as $section) {
    $section['parent_id'] = ($section['parent_id'] == 0 ? 'NULL' : $section['parent_id']);
    $query = "UPDATE sections SET parent_id={$section['parent_id']}, position={$section['position']}
                WHERE section_id={$section['section_id']}";

    mysqli_query($link, $query);
} 

echo true;