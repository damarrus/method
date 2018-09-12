<?php

require_once 'functions.php';
require_once 'data.php';

require_once 'templates/header.php';

foreach ($pages as $key => $page) {
    
}

echo '<div class="page">';
require 'pages/3_javascript.php';
echo '</div>';

echo '<div class="page">';
require 'pages/3_javascript.php';
echo '</div>';

echo '<div class="page">';
require 'pages/3_javascript.php';
echo '</div>';

require_once 'templates/footer.php';

?>