@echo off
cd /d C:\Users\xhskw\OneDrive\デスクトップ\Git_workspace\portfolio

echo ---------------------------------------------------------------
git add .
echo ---------------------------------------------------------------
git commit --allow-empty-message -m ""
echo ---------------------------------------------------------------
git push origin main
echo ---------------------------------------------------------------
pause
exit

rem ------------------------------------
:ERR_add
echo addで異常終了しました。

:ERR_commi
echo commitで異常終了しました。

:ERR_push
echo pushで異常終了しました。
 
pause
exit

