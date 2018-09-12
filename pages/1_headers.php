<?php

printHtml('<p>123</p>');

var_dump(basename(__FILE__));

$data = [
    [
        'html' => '<i>Текст</i>',
        'description' => 'Курсивный текст',
        'example' => '<i>Текст</i>'
    ],
    [
        'html' => '<u>Текст</u>',
        'description' => 'Подчеркнутый текст',
        'example' => '<u>Текст</u>'
    ],
    [
        'html' => '<b>Текст</b>',
        'description' => 'Жирное начертание текста',
        'example' => '<b>Текст</b>'
    ],
    [
        'html' => '<s>Текст</s>',
        'description' => 'Перечеркнутый текст',
        'example' => '<s>Текст</s>'
    ],
    [
        'html' => '<br>',
        'description' => 'Перенос строки',
        'example' => ''
    ],
    [
        'html' => '<sup>Текст</sup>',
        'description' => 'Верхний индекс',
        'example' => '<sup>Текст</sup>'
    ],
    [
        'html' => '<sub>Текст</sub>',
        'description' => 'Нижний индекс',
        'example' => '<sub>Текст</sub>'
    ],
    
];

?>

<table class="table">
    <thead>
        <th>HTML-код</th>
        <th>Описание</th>
        <th>Пример</th>
    </thead>
    <tbody>
        <? foreach ($data as $tag) { ?>
            <tr>
                <td><?= printHtml($tag['html']) ?></td>
                <td><?= $tag['description'] ?></td>
                <td><?= $tag['example'] ?></td>
            </tr>
        <? } ?>
    </tbody>
</table>