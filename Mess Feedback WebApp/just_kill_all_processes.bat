@ECHO OFF
taskkill /f /IM nginx.exe >NUL  2>NUL
taskkill /f /IM php-cgi.exe >NUL  2>NUL
exit