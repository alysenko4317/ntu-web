@echo off
chcp 65001 >nul

set CONTAINER=lr5-php-mvc
set IMAGE=lr5-php-mvc
set PORT=8085

echo === LR5: Library Base — PHP MVC ===
echo.

:: Stop and remove existing container
docker rm -f %CONTAINER% 2>nul

:: Build image
echo [1/2] Building Docker image...
docker build -t %IMAGE% .
if errorlevel 1 (
    echo ERROR: Docker build failed.
    pause
    exit /b 1
)

:: Run container
echo [2/2] Starting container...
docker run -d --name %CONTAINER% -p %PORT%:80 %IMAGE%
if errorlevel 1 (
    echo ERROR: Container failed to start.
    pause
    exit /b 1
)

echo.
echo ========================================
echo   Site: http://localhost:%PORT%
echo   Stop: docker rm -f %CONTAINER%
echo ========================================
echo.
pause
