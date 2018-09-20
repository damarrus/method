<?php

pHeader('Селекторы', 1);

pHeader('Теги', 2);

pTextBlock('
Селектор по тегу выбирает ВСЕ элементы с данным тегом. В сам селектор необходимо написать название тега.
');

pCodeBlockHtmlCss(
'<h1>Заголовок 1</h1>
<h2>Заголовок 2</h2>
<h2>Заголовок 3</h2>'
,
'h1 {
    color: red;
}
h2 {
    color: green;
}', false,
'<h3 style="color: red">Заголовок 1</h3>
<h4 style="color: green">Заголовок 2</h4>
<h4 style="color: green">Заголовок 3</h4>'
);

pHeader('Классы', 2);

pTextBlock('
Чтобы использовать селектор по классу необходимо прописать специальный атрибут class с названием класса в необходимых элементах.
Одинаковые классы можно указывать у разных элементов, а также использовать несколько классов в одном элементе.
В селекторе записывается с точкой (.) в начале названия класса, в атрибуте class - без точки.
');

pCodeBlockHtmlCss(
'<span class="my-class-1">Красный цвет</span>
<span class="my-class-2">Шрифт 30px</span>
<span class="my-class-1 my-class-2">Оба эффекта</span>'
,
'.my-class-1 {
    color: red;
}
.my-class-2 {
    font-size: 30px;
}', false,
'<span style="color: red;">Красный цвет</span>
<span style="font-size: 30px;">Шрифт 30px</span>
<span style="color: red; font-size: 30px;">Оба эффекта</span>'
);

pHeader('Идентификаторы', 2);

pTextBlock('
Идентификатор является уникальным, то есть для корректной работы на вашей странице не должно быть двух и более элементов с одинаковым идентификатором.
Идентификатор записывается в специальный атрибут id, в селекторе записывается с решеткой (#) в начале названия идентификатора.
');

pCodeBlockHtmlCss(
'<p id="my-unique-element">Уникальный элемент</p>'
,
'#my-unique-element {
    color: red;
}', false,
'<p style="color: red;">Уникальный элемент</p>'
);


?>
