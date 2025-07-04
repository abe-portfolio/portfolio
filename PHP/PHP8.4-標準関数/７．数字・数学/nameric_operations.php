| 関数                           | 説明                   | 典型構文                                                   |
| ---------------------------- | -------------------- | ------------------------------------------------------ |
| `round($data[, $precision])` | 四捨五入                 | `round($data, 2);`                                     |
| `random_int($data1, $data2)` | 暗号論的乱数               | `random_int(1, 100);`                                  |
| `bcdivmod($data1, $data2)`   | **商と余りを同時取得**（8.4新規） | `[$q,$r] = bcdivmod($data1, $data2);` ([php.watch][1]) |

[1]: https://php.watch/versions/8.4/bcdivmod "BCMath: New `bcdivmod` function - PHP 8.4 • PHP.Watch"



<?php
?>