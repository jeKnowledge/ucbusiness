from django.shortcuts import render
from django.views import View
from .models import AboutText, NewsArticle, Position, Member


class LandingPage(View):
    template_name = 'ucbusinesssite/index.html'

    def get(self, request):
        return render(request, self.template_name)


class AboutPage(View):
    template_name = 'ucbusinesssite/about_us.html'

    def get(self, request):
        text = AboutText.objects.all()
        return render(request, self.template_name)


class NewsPage(View):
    news = NewsArticle.objects.all()
    template_name = 'ucbusinesssite/news.html'

    def get(self, request):
        return render(request, self.template_name)


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