@echo off
chcp 65001 >nul

echo === LR8: Library Base — Telegram Bot ===
echo.

:: Check .env file
if not exist .env (
    echo ERROR: File .env not found.
    echo Copy .env.example to .env and set your TELEGRAM_BOT_TOKEN.
    echo.
    echo   copy .env.example .env
    echo   notepad .env
    echo.
    pause
    exit /b 1
)

echo [1/2] Building and starting containers...
docker compose up --build -d
if errorlevel 1 (
    echo ERROR: Docker Compose failed.
    pause
    exit /b 1
)

echo [2/2] Waiting for services...
timeout /t 8 /nobreak >nul

echo.
echo ========================================
echo   Site:       http://localhost:8089
echo   Swagger UI: http://localhost:8090
echo   DB:         localhost:33080
echo.
echo   Bot: running in container lr8-telegram-bot
echo   Bot logs: docker compose logs bot -f
echo.
echo   Stop:    docker compose down
echo   Rebuild: docker compose up --build
echo ========================================
echo.
pause
