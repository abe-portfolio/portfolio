<?php
// DirectoryIteratorクラス … 指定されたディレクトリ配下のファイル情報にアクセスするためのクラス

// カレントディレクトリをオープン
$dir = new DirectoryIterator('./');
// ディレクトリ配下のファイルのみ処理
foreach ($dir as $file) {
    if($file->isFile()){  // isFile()はDirectoryIteratorクラスのインスタンスメソッド
        echo $file->getFilename() . "\n"; 
    }
}


/* 
メソッド名               | 対応するFS関数     |概要
================================================================================
$file->getATime()       | fileatime($path)  | ファイルの最終アクセス時刻を取得
$file->getCTime()       | filectime($path)  | ファイルの最終変更時刻を取得
$file->getBasename()    | basename($path)   | ファイルのベース名を取得
$file->getMTime()       | filemtime($path)  | ファイルの最終アクセス時刻を取得
$file->getPath()        | dirname($path)    | ファイルのパスを取得
$file->getPathname()    |  -                | ファイルのパスとファイル名を取得
$file->getSize()        | filesize($path)   | ファイルのサイズを取得
$file->isDir()          | is_dir($path)     | ディレクトリかどうかを判定
$file->isFile()         | is_file($path)    | ファイルかどうかを判定
$file->isLink()         | is_link($path)    | シンボリックリンクかどうかを判定
$file->getPerms()       | fileperms($path)  | ファイルのパーミッションを取得
$file->getOwner()       | fileowner($path)  | ファイルの所有者を取得
$file->getGroup()       | filegroup($path)  | ファイルのグループを取得
$file->getType()        | filetype($path)   | ファイルのタイプを取得
*/

