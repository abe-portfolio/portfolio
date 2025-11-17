<?php
// 可変変数
$x = 'title';
$title = 'PHP:Hypertext Preprocessor';
print $$x;
// $xはtitleなので、$titleと解釈され、$titleの値を表示する