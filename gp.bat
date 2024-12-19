@echo off
set PWD=%dp~0
cd /d %PWD%

echo ---------------------------------------------------------------
git add .
rem if %ERRORLEVEL% neq X goto ERR_add
echo add:%ERRORLEVEL%
echo,
echo add:OK
echo ---------------------------------------------------------------
git commit --allow-empty-message -m ""
rem if %ERRORLEVEL% neq X goto ERR_commit
echo commit:%ERRORLEVEL%
echo,
echo commit:OK
echo ---------------------------------------------------------------
git push origin main
rem if %ERRORLEVEL% neq X goto ERR_push
echo push:%ERRORLEVEL%
echo,
echo push:OK
echo ---------------------------------------------------------------
pause
exit

rem ------------------------------------
:ERR_add
echo addで異常終了しました。

:ERR_commit
echo commitで異常終了しました。

:ERR_push
echo pushで異常終了しました。
 
pause
exit

