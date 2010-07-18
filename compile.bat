@echo off
set adir="%cd%"
DEL com.tutorial.cms.tar
"%ProgramFiles%\7-Zip\7z.exe" a -r -ttar %adir%\files.tar %adir%\files\*
"%ProgramFiles%\7-Zip\7z.exe" a -r -ttar %adir%\templates.tar %adir%\templates\*
:"%ProgramFiles%\7-Zip\7z.exe" a -r -ttar %adir%\acptemplates.tar %adir%\acptemplates\*
:"%ProgramFiles%\7-Zip\7z.exe" a -r -ttar %adir%\pip.tar %adir%\pip\*
"%ProgramFiles%\7-Zip\7z.exe" a -r -ttar %adir%\com.tutorial.cms.tar @filelist.txt
DEL files.tar templates.tar acptemplates.tar pip.tar
