@echo off
set PWD=%~dp0
cd /d %PWD%

echo ---------------------------------------------------------------
echo pull:PROCESSING.....
echo,
git pull origin main
if %ERRORLEVEL% neq 0 goto ERR_pull
echo,
echo pull:OK
echo ---------------------------------------------------------------
echo,

REM --- ����I�� ---
echo ����I��
pause
exit

REM --- �ُ�I�� ---
:ERR_pull
echo,
echo #######################################
echo pull�ňُ�I�����܂����B
echo #######################################
echo,
goto END

:END
pause


