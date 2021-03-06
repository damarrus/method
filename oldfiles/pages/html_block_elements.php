<?php

pHeader('Блочные элементы', 1);

pList([
    'Располагаются сверху вниз;',
    'Занимают максимально возможное расстояние по ширине;',
    'Внутрь блочного элементы можно помещать как блочные так и строчные элементы;',
    'Позволяют изменять себя по ширине и высоте.'
], true);

pCodeBlock('<div>Контент</div> // Стандартный блочный элемент DIV');

pHeader('Заголовки', 2);

pTextBlock('Заголовки размечают структуру документа по разделам. 
Важно помнить, что не следует использовать более одного элемента H1.');

pCodeBlock(
'<h1>Заголовок 1</h1>
<h2>Заголовок 2</h2>
<h3>Заголовок 3</h3>
<h4>Заголовок 4</h4>
<h5>Заголовок 5</h5>
<h6>Заголовок 6</h6>',
false,true);

pHeader('Параграфы', 2);
pTextBlock('Параграфы используются для размещения обычного блока с текстом.');
pCodeBlock('<p>' . loremIpsum(true) . '</p>', false, '<p>' . loremIpsum() . '</p>');
    
pHeader('Цитаты', 2);
pTextBlock('Цитаты можно использовать не только для вывода цитат, но и для других текстовых блоков. 
Данный блок отличается от параграфа тем, что по умолчанию отображается на странице с отступом от левого и правого краев.');
pCodeBlock('<blockquote>' . loremIpsum(true) . '</blockquote>', false, '<blockquote>' . loremIpsum() . '</blockquote>');
