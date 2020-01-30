from django.shortcuts import render
from django.views import View
from .models import NewsArticle, Member
import datetime


class LandingPage(View):
    template_name = 'ucbusinesssite/index.html'

    def get(self, request):
        context = {}
        context['language'] = request.session.get('language', 'EN')
        news = NewsArticle.objects.all().order_by('-datePosted')
        if news:
            newsArticle1 = news[0]
            context['newsArticle1'] = newsArticle1
            if newsArticle1.imageurl_set.all():
                context['image1'] = newsArticle1.imageurl_set.all().first()        
        month = datetime.datetime.now().strftime('%B').upper()
        context['month'] = month
        return render(request, self.template_name, context)


class AboutPage(View):
    template_name = 'ucbusinesssite/about_us.html'

    def get(self, request):
        context = {}
        context['language'] = request.session.get('language', 'EN')
        members = Member.objects.all()
        if members:
            context['topMember'] = members.first()
            context['members'] = members[1:]
        return render(request, self.template_name, context)


class NewsPage(View):
    template_name = 'ucbusinesssite/insight.html'

    def get(self, request):
        context = {}
        context['language'] = request.session.get('language', 'EN')
        news = NewsArticle.objects.all()
        if news:
            context['news'] = news.order_by('-datePosted')
        return render(request, self.template_name, context)


class UCInvestPage(View):
    template_name = 'ucbusinesssite/ucinvest.html'

    def get(self, request):
        context = {}
        context['language'] = request.session.get('language', 'EN')
        return render(request, self.template_name, context)


class UCPartnerShipPage(View):
    template_name = 'ucbusinesssite/ucpartnership.html'

    def get(self, request):
        context = {}
        context['language'] = request.session.get('language', 'EN')
        return render(request, self.template_name, context)


class UCValuePage(View):
    template_name = 'ucbusinesssite/ucvalue.html'

    def get(self, request):
        context = {}
        context['language'] = request.session.get('language', 'EN')
        return render(request, self.template_name, context)


class ContactsPage(View):
    template_name = 'ucbusinesssite/contacts.html'

    def get(self, request):
        context = {}
        context['language'] = request.session.get('language', 'EN')
        return render(request, self.template_name, context)


class NewsArticlePage(View):
    template_name = 'ucbusinesssite/new.html'

    def get(self, request, title):
        context = {}
        context['language'] = request.session.get('language', 'EN')
        newsArticle = NewsArticle.objects.get(title=title)
        context['newsArticle'] = newsArticle
        return render(request, self.template_name, context)