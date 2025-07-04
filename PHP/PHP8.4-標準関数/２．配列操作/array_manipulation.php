| 関数                                                              | 説明                    | 典型構文                                                  |
| --------------------------------------------------------------- | --------------------- | ----------------------------------------------------- |
| `array_map($fn, $data[])`                                       | 各要素へ関数適用              | `$out = array_map('trim', $data[]);`                  |
| `array_filter($data[], $fn)`                                    | 条件で抽出                 | `$even = array_filter($data[], fn($v)=>$v%2==0);`     |
| `array_reduce($data[], $fn, $init)`                             | 畳み込み                  | `$sum = array_reduce($data[], fn($c,$v)=>$c+$v, 0);`  |
| `array_merge($data1[], $data2[])`                               | 配列結合                  | `$all = array_merge($data1[], $data2[]);`             |
| `in_array($data, $data[])` / `array_key_exists($data, $data[])` | 値／キー存在確認              | `if (in_array($data, $data[])) …`                     |
| `sort($data[])` / `usort($data[], $fn)`                         | ソート                   | `usort($data[], fn($a,$b)=>$a<=>$b);`                 |
| `array_find($data[], $fn)`                                      | **条件を満たす最初の値**（8.4新規） | `array_find($data[], fn($v)=>$v>0);` ([php.watch][1]) |
| `array_find_key($data[], $fn)`                                  | **条件キー取得**（8.4新規）     | `array_find_key($data[], $fn);` ([php.watch][1])      |
| `array_any($data[], $fn)` / `array_all($data[], $fn)`           | **いずれか／すべて一致**（8.4新規） | `array_any($data[], $fn);` ([php.watch][1])           |

[1]: https://php.watch/versions/8.4/array_find-array_find_key-array_any-array_all "New `array_find`, `array_find_key`, `array_any`, and `array_all` functions - PHP 8.4 • PHP.Watch"

<?php

?>