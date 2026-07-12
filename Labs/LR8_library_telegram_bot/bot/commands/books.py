"""Обробники команд /books та /book <id>."""

from telegram import Update
from telegram.ext import ContextTypes
from services.api_client import get_books, get_book_by_id


async def books(update: Update, context: ContextTypes.DEFAULT_TYPE):
    """Команда /books — список усіх книг."""

    books_list = get_books()

    if not books_list:
        await update.message.reply_text("Книг не знайдено або API недоступне.")
        return

    lines = []
    for book in books_list:
        authors = _format_authors(book)
        year = _format_year(book)
        lines.append(f"*{book['name']}*\n_{authors}{year}_")

    message = "\n\n".join(lines)
    await update.message.reply_text(message, parse_mode="Markdown")


async def book_detail(update: Update, context: ContextTypes.DEFAULT_TYPE):
    """Команда /book <id> — деталі однієї книги."""

    if not context.args:
        await update.message.reply_text("Використання: /book <id>\nНаприклад: /book 1")
        return

    try:
        book_id = int(context.args[0])
    except ValueError:
        await update.message.reply_text("ID книги має бути числом.")
        return

    book = get_book_by_id(book_id)

    if not book:
        await update.message.reply_text(f"Книгу з ID={book_id} не знайдено.")
        return

    authors = _format_authors(book)
    year = _format_year(book)

    message = (
        f"*{book['name']}*\n"
        f"Код: `{book.get('code', '—')}`\n"
        f"Автори: _{authors}_\n"
        f"Рік: {year if year else '—'}"
    )
    await update.message.reply_text(message, parse_mode="Markdown")


def _format_authors(book: dict) -> str:
    authors = book.get("authors", [])
    if authors:
        return ", ".join(
            f"{a.get('firstName', '')} {a.get('lastName', '')}".strip()
            for a in authors
        )
    return "автор невідомий"


def _format_year(book: dict) -> str:
    release = book.get("releaseDate", "")
    if release:
        return f" ({release[:4]})"
    return ""
