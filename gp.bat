@echo off
cd /d C:\Users\xhskw\OneDrive\�f�X�N�g�b�v\Git_workspace\portfolio

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
echo add�ňُ�I�����܂����B

:ERR_commi
echo commit�ňُ�I�����܂����B

:ERR_push
echo push�ňُ�I�����܂����B
 
pause
exit

