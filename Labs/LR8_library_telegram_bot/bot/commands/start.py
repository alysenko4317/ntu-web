"""Обробник команди /start та /help."""

from telegram import Update
from telegram.ext import ContextTypes


async def start(update: Update, context: ContextTypes.DEFAULT_TYPE):
    message = (
        "Привіт! Це бот бібліотеки *Library Base*.\n\n"
        "Доступні команди:\n"
        "/books — список усіх книг\n"
        "/book <id> — деталі книги за ID\n"
        "/rooms — зали бібліотеки\n"
        "/help — ця довідка"
    )
    await update.message.reply_text(message, parse_mode="Markdown")
