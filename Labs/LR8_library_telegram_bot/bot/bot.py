"""
Telegram-бот для бібліотеки (ЛР8).

Використовує REST API з PHP-застосунку (ЛР7) для отримання даних
про книги, читачів та зали бібліотеки.
"""

import os
import sys
import logging

sys.path.append(os.path.dirname(os.path.abspath(__file__)))

from telegram.ext import Application, CommandHandler
from commands.start import start
from commands.books import books, book_detail
from commands.rooms import rooms

logging.basicConfig(
    format="%(asctime)s - %(name)s - %(levelname)s - %(message)s",
    level=logging.INFO,
)
logger = logging.getLogger(__name__)

TOKEN = os.getenv("TELEGRAM_BOT_TOKEN")


def main():
    if not TOKEN:
        raise ValueError(
            "TELEGRAM_BOT_TOKEN not set. "
            "Create a bot via @BotFather and set the token in .env"
        )

    application = Application.builder().token(TOKEN).build()

    application.add_handler(CommandHandler("start", start))
    application.add_handler(CommandHandler("help", start))
    application.add_handler(CommandHandler("books", books))
    application.add_handler(CommandHandler("book", book_detail))
    application.add_handler(CommandHandler("rooms", rooms))

    logger.info("Bot started, polling for updates...")
    application.run_polling()


if __name__ == "__main__":
    main()
