@echo off
set PWD=%~dp0
cd /d %PWD%

echo ---------------------------------------------------------------
echo pull:PROCESSING.....
echo,
git pull origin main
if %ERRORLEVEL% neq 0 goto ERR_pull
echo,
echo --^> pull:OK
echo ---------------------------------------------------------------
echo,

REM --- 正常終了 ---
echo 正常終了
goto END

REM --- 異常終了 ---
:ERR_pull
echo,
echo --^> pullで異常終了しました。
echo,
goto END

:END
pause


