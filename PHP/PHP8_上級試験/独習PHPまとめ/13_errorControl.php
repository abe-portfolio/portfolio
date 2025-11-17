<?php
// エラー制御演算子
//  ->@ を使用することで、その命令で発生したエラーメッセージを抑制する（表示させない）
$data = ['apple' => 'りんご'];
// print $data['orange']; // Undefined array key "orange"
print @$data['orange'];   // 何も表示されない
?>