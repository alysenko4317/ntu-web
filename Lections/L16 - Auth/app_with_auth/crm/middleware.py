
from datetime import datetime

from django.shortcuts import redirect
from django.urls import reverse

from crm.models import Session   # Import your Session model

class CheckSessionMiddleware:
    def __init__(self, get_response):
        self.get_response = get_response

    def __call__(self, request):
        try:
            sessid = request.COOKIES.get('sessid')
            session = Session.objects.get(
                key=sessid,
                expires__gt=datetime.now(),
            )
            request.session = session
            request.user = session.user
        except Session.DoesNotExist:
            request.session = None
            request.user = None

        # Check if the user is authenticated and the URL requires authentication
        if not request.session and self.requires_authentication(request.path_info):
            return redirect(reverse('crm:crm-login'))  # Replace 'login' with your login URL name

        response = self.get_response(request)
        return response

    def requires_authentication(self, path):
        # Define a list of URLs that require authentication
        restricted_urls = ['/crm/']  # Add other URLs as needed
        return path in restricted_urls