<?php

require_once 'functions.php';

require_once 'templates/header.php';

if ($_REQUEST['page']) {
    pPage($_REQUEST['page']);
} else {
    $pages = [
        'html_structure',
        'html_block_elements',
        'html_string_elements',
        'javascript_intro',
        'html_links',
    ];
    
    foreach($pages as $page) {
        pPage($page);
    }
}

require_once 'templates/footer.php';
    
?>