from django.urls import path
from . import views

app_name = 'ucbusinesssite'

urlpatterns = [
    path('',views.LandingPage.as_view(), name='index'),
    path('about/', views.AboutPage.as_view(), name='about'),
    path('insights/', views.NewsPage.as_view(), name='insights'),
    path('insights/<str:title>/',views.NewsArticlePage.as_view(), name='newsArticle'),
    path('ucinvest/', views.UCInvestPage.as_view(), name='ucInvest'),
    path('ucpartnership/', views.UCPartnerShipPage.as_view(), name='ucPartnership'),
    path('ucvalue/', views.UCValuePage.as_view(), name='ucValue'),
    path('contacts/', views.ContactsPage.as_view(), name='contacts'),
    path('changelanguage/<str:language>', views.changeLanguage, name='changeLanguage')
]