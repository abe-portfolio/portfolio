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

REM --- ����I�� ---
echo ����I��
goto END

REM --- �ُ�I�� ---
:ERR_pull
echo,
echo --^> pull�ňُ�I�����܂����B
echo,
goto END

:END
pause


