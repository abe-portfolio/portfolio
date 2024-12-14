@echo off
cd /d C:\Users\xhskw\OneDrive\デスクトップ\Git_workspace\portfolio

echo ---------------------------------------------------------------
echo add
git add .
echo ---------------------------------------------------------------
echo commit
git commit --allow-empty-message -m ""
echo ---------------------------------------------------------------
echo push
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

