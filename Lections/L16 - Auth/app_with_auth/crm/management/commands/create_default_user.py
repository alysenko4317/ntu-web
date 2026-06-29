#from django.contrib.auth.models import User

from crm.models import User
from django.core.management.base import BaseCommand
from crm.services.login_service_impl import md5_hash


class Command(BaseCommand):
    help = 'Create a default user in the database'

    def handle(self, *args, **options):
        username = 'admin'
        password = md5_hash('1234')

        # Create the default user if it doesn't exist
        if not User.objects.using('crm').filter(login=username).exists():
            user = User.objects.using('crm').create(
                login=username,
                password=password,
            )
            self.stdout.write(self.style.SUCCESS('Default user created successfully'))
        else:
            self.stdout.write(self.style.SUCCESS('Default user already exists'))
