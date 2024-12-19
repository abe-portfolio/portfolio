@echo off
set PWD=%~dp0
cd /d %PWD%

echo ---------------------------------------------------------------
echo add:PROCESSING.....
echo,
git add .
if %ERRORLEVEL% neq 0 goto ERR_add
echo,
echo add:OK
echo ---------------------------------------------------------------
echo commit:PROCESSING.....
echo,
git commit --allow-empty-message -m ""
if %ERRORLEVEL% neq 0 goto ERR_commit
echo,
echo commit:OK
echo ---------------------------------------------------------------
echo push:PROCESSING.....
echo,
git push origin main
if %ERRORLEVEL% neq 0 goto ERR_push
echo,
echo push:OK
echo ---------------------------------------------------------------
echo,

REM --- 正常終了 ---
pause
exit

REM --- 異常終了 ---
:ERR_add
echo #######################################
echo addで異常終了しました。
echo #######################################
goto END

:ERR_commit
echo #######################################
echo commitで異常終了しました。
echo #######################################
goto END

:ERR_push
echo #######################################
echo pushで異常終了しました。
echo #######################################
goto END
 
:END
pause
exit

