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

REM --- ����I�� ---
pause
exit

REM --- �ُ�I�� ---
:ERR_add
echo #######################################
echo add�ňُ�I�����܂����B
echo #######################################
goto END

:ERR_commit
echo #######################################
echo commit�ňُ�I�����܂����B
echo #######################################
goto END

:ERR_push
echo #######################################
echo push�ňُ�I�����܂����B
echo #######################################
goto END
 
:END
pause
exit

