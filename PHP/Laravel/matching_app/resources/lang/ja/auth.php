<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'register' => [
        'title' => '新規登録',
        'form' => [
            'name' => '名前',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'confirm_password' => 'パスワード(確認用)',
            'role' => 'ユーザー種別',
            'admin' => '管理者',
            'user' => '一般ユーザー',
            'company' => '企業ユーザー',
        ],
        'button' => '登録',
        'success' => 'ユーザーを登録しました。',
    ],

    'login' => [
        'title' => 'ログイン',
        'form' => [
            'name' => '名前',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'confirm_password' => 'パスワード(確認用)',
            'role' => 'ユーザー種別',
            'admin' => '管理者',
            'user' => '一般ユーザー',
            'company' => '企業ユーザー',
            'remember_me' => 'ログイン状態を保存する',
            'forgot_your_password' => 'パスワードを忘れた場合はこちら',
        ],
        'button' => '登録',
        'success' => 'ログインしました。',
    ],

    'reset' => [
        'title' => 'パスワードリセット',
        'form' => [
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'confirm_password' => 'パスワード確認',
        ],
        'button' => 'パスワードリセット',
    ],

    
    'failed' => '認証情報が登録されていません。',
    'password' => '入力されたパスワードが正しくありません。',
    'throttle' => 'ログイン試行回数が規定回数を超過しました。:seconds秒後に再度お試しください。',    
];
?>