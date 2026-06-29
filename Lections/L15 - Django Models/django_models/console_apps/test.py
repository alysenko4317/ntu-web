import os
import django

os.environ.setdefault("DJANGO_SETTINGS_MODULE", "django_models.settings")
django.setup()   # initialize Django environment

from web_app.models import *

def main():
    # Your code that uses Django models
    queryset = Bachelor.objects.all()
    for obj in queryset:
        print(obj)

if __name__ == "__main__":
    main()