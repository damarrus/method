<?php

pHeader('Подключение JavaScript');

pTextBlock('
jQuery - это библиотека JavaScript. Значительно упрощает решение
повседневных задач и сокращает количество кода.
');

pTextBlock('
Скачать библиотеку можно по ссылке <a href="https://jquery.com/" target="_blank">https://jquery.com/</a>.
Подключить jQuery можно как обычный файл JavaScript
');

pCodeBlock(
'<script src="main.js"></script>
<script src="jquery-3.3.1.js"></script>
',
'Подключение jQuery необходимо осуществить до подключения ваших файлов JavaScript'
);

pCodeBlock(
'<script>
    alert("Привет, Мир!"); // данная функция выведет в браузер диалоговое окно с введенным текстом
</script>'
);

pTextBlock('
С точки зрения структуры кода, рекомендуется вынести JavaScript-код в отдельный файл *.js и указать ссылку на него.
При этом внутри тегов script ничего писать не нужно.
');

pCodeBlock('<script src="main.js"></script>');

pTextBlock('С помощью нескольких тегов script вы можете подключить несколько файлов JavaScript.');

?>
