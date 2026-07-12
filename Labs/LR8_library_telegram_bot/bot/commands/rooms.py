"""Обробник команди /rooms."""

from telegram import Update
from telegram.ext import ContextTypes
from services.api_client import get_rooms


async def rooms(update: Update, context: ContextTypes.DEFAULT_TYPE):
    """Команда /rooms — список залів бібліотеки."""

    rooms_list = get_rooms()

    if not rooms_list:
        await update.message.reply_text("Зали не знайдено або API недоступне.")
        return

    lines = [f"• *{room['name']}* (id: `{room['id']}`)" for room in rooms_list]
    message = "Зали бібліотеки:\n\n" + "\n".join(lines)

    await update.message.reply_text(message, parse_mode="Markdown")
