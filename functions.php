<?php 

function pHtml($code) {
    echo '<xmp class="prettyprint">' . $code . '</xmp>';
}

function pHeader($text, $header = 1) {
    echo '<h' . $header . ' class="main-header">' . $text . '</h' . $header . '>';
}

function pTextBlock($text) {
    echo '<p class="block-text">' . $text . '</p>';
}

function pList($items, $isNum = false) {
    $result = $isNum ? '<ol>' : '<ul>';
    foreach($items as $item) {
        $result .= '<li>' . $item . '</li>';
    }
    $result .= $isNum ? '</ol>' : '</ul>';
    echo $result;
}

function pAlertBlock($text, $type, $header = 'Внимание') {
    echo '<div class="alert alert-' . $type .'" role="alert"><h4>' . $header . '</h4><p>' . $text . '</p></div>';
}

function pTable($headers, $data) {
    $result = '<table class="table"><thead><tr>';
    foreach($headers as $header) {
        $result .= '<th>' . $header . '</th>';
    }
    $result .= '</tr></thead><tbody>';
    foreach($data as $row) {
        $result .= '<tr>';
        foreach($row as $type => $cell) {
            if ($type == 'html') {
                $cell = '<xmp class="prettyprint">' . $cell . '</xmp>';
            }
            $result .= '<td>' . $cell . '</td>';
        }
        $result .= '</tr>';
    }
    $result .= '</tbody></table>';
    echo $result;
}

function pCodeBlock($code, $comment = false, $result_code = false, $lang = false) {
    $result = '<div class="card code bg-light">';
    if ($comment !== false) {
        $result .= '<div class="card-header">' . $comment . '</div>';
    }
    $result .= '<div class="card-body"><xmp class="prettyprint ' . ($css ? 'lang-css':'') . '">' . $code . '</xmp></div>';

    if ($result_code === true) {
        $result .= '<div class="card-footer">' . $code . '</div>';
    } else if ($result_code !== false) {
        $result .= '<div class="card-footer">' . $result_code . '</div>';
    }

    $result .= '</div>';
    
    echo $result;
}

function pCodeBlockHtmlCss($code_html, $code_css, $comment = false, $result_code = false, $lang = false) {
    $result = '<div class="card code code-html-css bg-light">';
    if ($comment !== false) {
        $result .= '<div class="card-header">' . $comment . '</div>';
    }
    $result .= 
        '<div class="card-body">
            <div class="card-group">
                <div class="card code-html bg-light">
                    <div class="card-header">HTML-код</div>
                    <div class="card-body"><xmp class="prettyprint">' . $code_html . '</xmp></div>
                </div>
                <div class="card code-css bg-light">
                    <div class="card-header">CSS-код</div>
                    <div class="card-body"><xmp class="prettyprint lang-css">' . $code_css . '</xmp></div>
                </div>
            </div>
        </div>';

    if ($result_code) {
        $result .= '<div class="card-footer">' . $result_code . '</div>';
    }

    $result .= '</div>';
    
    echo $result;
}

function pPage($file_name) {
    echo '<div class="page">';
    require_once "pages/$file_name.php";
    echo '</div>';
}

function loremIpsum($cut = false) {
    if ($cut) {
        return 'Lorem ipsum dolor sit amet...';
    } else {
        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
    }
}

?>