@echo off
chcp 65001 >nul

echo === LR6: Library Base — Docker + MySQL ===
echo.

echo [1/2] Building and starting containers...
docker compose up --build -d
if errorlevel 1 (
    echo ERROR: Docker Compose failed.
    pause
    exit /b 1
)

echo [2/2] Waiting for services...
timeout /t 5 /nobreak >nul

echo.
echo ========================================
echo   Site: http://localhost:8086
echo   DB:   localhost:33060 (library_user / library_pass)
echo.
echo   Stop:    docker compose down
echo   Logs:    docker compose logs -f
echo   Rebuild: docker compose up --build
echo ========================================
echo.
pause
