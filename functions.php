<?php 

function pHtml($code) {
    echo '<xmp class="prettyprint">' . $code . '</xmp>';
}

function pHeader($text) {
    echo '<h1 class="main-header">' . $text . '</h1>';
}

function pTextBlock($text) {
    echo '<p class="block-text">' . $text . '</p>';
}

function pInfoBlock($text) {
    echo '<div class="alert alert-info" role="alert">' . $text . '</div>';
}

function pCodeBlock($code, $comment = false, $lang = false) {
    $result = '<div class="card code bg-light">';
    if ($comment !== false) {
        $result .= '<div class="card-header">' . $comment . '</div>';
    }
    $result .= '<div class="card-body"><xmp class="prettyprint ' . ($css ? 'lang-css':'') . '">' . $code . '</xmp></div></div>';
    
    echo $result;
}

function pPage($file_name) {
    echo '<div class="page">';
    require_once $file_name;
    echo '</div>';
}

?>