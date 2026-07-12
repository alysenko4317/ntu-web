"""
HTTP-клієнт для взаємодії з REST API PHP-застосунку.

Використовує бібліотеку requests для синхронних HTTP-запитів
до ендпоінтів, визначених у ЛР7 (/api/books, /api/rooms тощо).
"""

import os
import logging

import requests

BASE_URL = os.getenv("API_BASE_URL", "http://app:80")

logger = logging.getLogger(__name__)


def get_books() -> list:
    """GET /api/books — список усіх книг з авторами."""
    return _get(f"{BASE_URL}/api/books")


def get_book_by_id(book_id: int) -> dict | None:
    """GET /api/books/{id} — одна книга за ID."""
    data = _get(f"{BASE_URL}/api/books/{book_id}")
    if isinstance(data, dict) and "error" in data:
        return None
    return data


def get_rooms() -> list:
    """GET /api/rooms — список залів бібліотеки."""
    return _get(f"{BASE_URL}/api/rooms")


def _get(url: str):
    """Універсальний GET-запит з обробкою помилок."""
    try:
        response = requests.get(url, timeout=10)
        response.raise_for_status()
        return response.json()
    except requests.RequestException as e:
        logger.error("API request failed: %s — %s", url, e)
        return []
