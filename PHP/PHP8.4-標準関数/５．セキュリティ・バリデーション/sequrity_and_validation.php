| 関数                                         | 説明        | 典型構文                                              |
| ------------------------------------------ | --------- | ------------------------------------------------- |
| `password_hash($data, PASSWORD_DEFAULT)`   | パスワードハッシュ | `$hash = password_hash($data, PASSWORD_DEFAULT);` |
| `password_verify($data, $hash)`            | ハッシュ照合    | `password_verify($data, $hash);`                  |
| `filter_var($data, FILTER_VALIDATE_EMAIL)` | メール形式検証   | `filter_var($data, FILTER_VALIDATE_EMAIL);`       |


<?php
?>