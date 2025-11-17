@echo off
setlocal enabledelayedexpansion

rem ---対象フォルダのパス
set /p TARGET="対象フォルダのパスを入力してください: "

rem ---接頭語
set /p PREFIX="追加する接頭語を入力してください: "

rem ---パス存在チェック
if not exist "%TARGET%" (
    echo 指定したパスが存在しません。
    pause
    exit /b
)

echo リネーム処理を開始します...
echo.

rem ---フォルダ内ファイルをループ
for %%F in ("%TARGET%\*") do (
    if exist "%%F" (
        rem ---ディレクトリはスキップ
        if not "%%~aF"=="d" (
            set "OLD=%%~nxF"
            set "NEW=%PREFIX%!OLD!"
            ren "%%F" "!NEW!"
            echo %%~nxF ^> !NEW!
        )
    )
)

echo.
echo 完了しました。
pause
