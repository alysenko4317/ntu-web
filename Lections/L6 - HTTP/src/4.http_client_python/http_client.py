"""
Мінімальний HTTP-клієнт без браузера.
Перед запуском підніміть Flask-сервер з 2.flask_routes (порт 8002).
"""
import urllib.request

URL = "http://localhost:8002/hello2?name=Student"

req = urllib.request.Request(
    URL,
    headers={
        "User-Agent": "python-urllib-client",
        "X-token": "demo-token",
    },
)

with urllib.request.urlopen(req) as response:
    print(f"Status: {response.status}")
    print(f"Content-Type: {response.headers.get('Content-Type')}")
    print("Body:")
    print(response.read().decode("utf-8"))
