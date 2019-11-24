from django.shortcuts import render
from django.views import View


class LandingPage(View):
    template_name = 'ucbusinesssite/index.html'

    def get(self, request):
        return render(request, self.template_name)


class AboutPage(View):
    template_name = 'ucbusinesssite/about_us.html'

    def get(self, request):
        return render(request, self.template_name)


class NewsPage(View):
    template_name = 'ucbusinesssite/news.html'

    def get(self, request):
        return render(request, self.template_name)
