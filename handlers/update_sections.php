<?php

//echo true;

//var_dump($_REQUEST);

include ('../db.php');

foreach ($_REQUEST['sections'] as $section) {
    $query = "UPDATE sections SET parent_id={$section['parent_id']}, position={$section['position']}
              WHERE section_id={$section['section_id']}";
    mysqli_query($link, $query);
}

echo true;