from django.urls import path
from . import views

app_name = 'ucBusinessSite'

urlpatterns = [
    path('',views.LandingPage.as_view(), name='landingPage'),
    path('about/', views.AboutPage.as_view(), name='aboutPage'),
    path('news/', views.NewsPage.as_view(), name='newsPage'),
]