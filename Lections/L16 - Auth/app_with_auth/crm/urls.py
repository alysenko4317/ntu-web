from django.urls import path
from . import views

app_name = 'crm'  # Set your app name

urlpatterns = [
    path('', views.welcome, name='crm-welcome'),
    path('login/', views.login, name='crm-login'),
    path('logout/', views.logout, name='crm-logout'),
]
