
from datetime import datetime, timedelta
from django.shortcuts import render, HttpResponseRedirect
from crm.services.login_service_impl import do_login
from crm.models import Session

def welcome(request):
    return render(request, 'welcome.html')

def login(request):
    error = ''

    if request.method == 'POST':
        login = request.POST.get('login')
        password = request.POST.get('password')
        url = request.POST.get('continue', '')
        if not url:
            url = '/crm'

        sessid = do_login(login, password)

        if sessid:
            response = HttpResponseRedirect(url)
            response.set_cookie(
                'sessid', sessid,
                #domain='.site.com',
                httponly=True,
                expires=datetime.now() + timedelta(days=5)
            )
            return response
        else:
            error = u'Неверный логин / пароль'

    return render(request, 'login.html', {'error': error})

def logout(request):
    sessid = request.COOKIES.get('sessid')
    if sessid is not None:
        Session.objects.filter(key=sessid).delete()  # Use filter to delete the session
    url = request.GET.get('continue', '')
    if not url:
        url = '/crm'
    return HttpResponseRedirect(url)
