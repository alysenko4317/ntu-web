@echo off
chcp 65001 >nul

echo === LR7: Library Base — REST API + Swagger ===
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
echo   Site:       http://localhost:8087
echo   Swagger UI: http://localhost:8088
echo   DB:         localhost:33070 (library_user / library_pass)
echo.
echo   API endpoints:
echo     GET    /api/books
echo     GET    /api/books/{id}
echo     POST   /api/books
echo     PUT    /api/books/{id}
echo     DELETE /api/books/{id}
echo     GET    /api/readers
echo     GET    /api/rooms
echo.
echo   Stop:    docker compose down
echo   Logs:    docker compose logs -f
echo   Rebuild: docker compose up --build
echo ========================================
echo.
pause
