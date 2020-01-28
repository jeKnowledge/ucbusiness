from django.shortcuts import render
from django.views import View
from .models import NewsArticle, Role, Member
import datetime


class LandingPage(View):
    template_name = 'ucbusinesssite/index.html'

    def get(self, request):
        news = NewsArticle.objects.all()
        month = datetime.datetime.now().strftime('%B').upper()
        return render(request, self.template_name, {'month': month,'newsArticles': news})


class AboutPage(View):
    template_name = 'ucbusinesssite/about_us.html'

    def get(self, request):
        return render(request, self.template_name)


class NewsPage(View):
    template_name = 'ucbusinesssite/insight.html'

    def get(self, request):
        news = NewsArticle.objects.all().order_by('datePosted')
        return render(request, self.template_name, {'newsArticles': news})


class UCInvestPage(View):
    template_name = 'ucbusinesssite/ucinvest.html'

    def get(self, request):
        return render(request, self.template_name)


class UCPartnerShipPage(View):
    template_name = 'ucbusinesssite/ucpartnership.html'

    def get(self, request):
        return render(request, self.template_name)


class UCValuePage(View):
    template_name = 'ucbusinesssite/ucvalue.html'

    def get(self, request):
        return render(request, self.template_name)


class ContactsPage(View):
    template_name = 'ucbusinesssite/contacts.html'

    def get(self, request):
        return render(request, self.template_name)