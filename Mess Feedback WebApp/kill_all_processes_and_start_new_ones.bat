@ECHO OFF
taskkill /f /IM nginx.exe >NUL  2>NUL
taskkill /f /IM php-cgi.exe >NUL  2>NUL
RunHiddenConsole.exe php\php-cgi.exe -b 127.0.0.1:9000
RunHiddenConsole.exe nginx.exe
exit