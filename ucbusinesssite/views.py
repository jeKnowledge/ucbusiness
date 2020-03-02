from django.views import View
from django.shortcuts import render
from django.http import HttpResponseRedirect
from django.core.mail import send_mail, BadHeaderError

from .models import NewsArticle, Member
from .forms import ContactForm

import datetime


class LandingPage(View):
    template_name = 'ucbusinesssite/index.html'

    def get(self, request):
        context = {}
        request.session['language'] = request.session.get('language', 'EN')
        request.session['cookieBanner'] = request.session.get('cookieBanner', True)
        news = NewsArticle.objects.all().order_by('-datePosted')
        if news:
            newsArticle1 = news[0]
            context['newsArticle1'] = newsArticle1
            if newsArticle1.imageurl_set.all():
                context['image1'] = newsArticle1.imageurl_set.all().first()
            if len(news) > 1:
                newsArticle2 = news[1]
                context['newsArticle2'] = newsArticle2
                if newsArticle2.imageurl_set.all():
                    context['image2'] = newsArticle2.imageurl_set.all().first()
        month = datetime.datetime.now().strftime('%B').upper()
        context['month'] = month

        return render(request, self.template_name, context)


class AboutPage(View):
    template_name = 'ucbusinesssite/about_us.html'

    def get(self, request):
        context = {}
        request.session['language'] = request.session.get('language', 'EN')
        request.session['cookieBanner'] = request.session.get('cookieBanner', True)
        members = Member.objects.all()
        if members:
            context['topMember'] = members.first()
            context['members'] = members[1:]
        return render(request, self.template_name, context)


class NewsPage(View):
    template_name = 'ucbusinesssite/insight.html'

    def get(self, request):
        context = {}
        request.session['language'] = request.session.get('language', 'EN')
        request.session['cookieBanner'] = request.session.get('cookieBanner', True)
        news = NewsArticle.objects.all()
        if news:
            context['news'] = news.order_by('-datePosted')
        return render(request, self.template_name, context)


class UCInvestPage(View):
    template_name = 'ucbusinesssite/ucinvest.html'

    def get(self, request):
        context = {}
        request.session['language'] = request.session.get('language', 'EN')
        request.session['cookieBanner'] = request.session.get('cookieBanner', True)
        return render(request, self.template_name, context)


class UCPartnerShipPage(View):
    template_name = 'ucbusinesssite/ucpartnership.html'

    def get(self, request):
        context = {}
        request.session['language'] = request.session.get('language', 'EN')
        request.session['cookieBanner'] = request.session.get('cookieBanner', True)
        return render(request, self.template_name, context)


class UCValuePage(View):
    template_name = 'ucbusinesssite/ucvalue.html'

    def get(self, request):
        context = {}
        request.session['language'] = request.session.get('language', 'EN')
        request.session['cookieBanner'] = request.session.get('cookieBanner', True)
        return render(request, self.template_name, context)


class ContactsPage(View):
    template_name = 'ucbusinesssite/contacts.html'

    def get(self, request):
        context = {}
        request.session['language'] = request.session.get('language', 'EN')
        request.session['cookieBanner'] = request.session.get('cookieBanner', True)
        return render(request, self.template_name, context)

    def post(self, request):
        form = ContactForm(request.POST)
        if form.is_valid():
            name = form.cleaned_data['name']
            email = form.cleaned_data['email']
            message = form.cleaned_data['message']
            try:
                send_mail('UC Business website form', name+'\n\n'+message, email, ['joao.cardoso@jeknowledge.com'])
            except BadHeaderError:
                print('erro')
        return render(request, self.template_name, {})


class NewsArticlePage(View):
    template_name = 'ucbusinesssite/new.html'

    def get(self, request, title):
        context = {}
        request.session['language'] = request.session.get('language', 'EN')
        request.session['cookieBanner'] = request.session.get('cookieBanner', True)
        newsArticle = NewsArticle.objects.get(title=title)
        context['newsArticle'] = newsArticle
        newsImages = []
        for image in newsArticle.imageurl_set.all():
            newsImages.append(image.url)
        context['newsImages'] = newsImages
        return render(request, self.template_name, context)


def changeLanguage(request, language):
    request.session['language'] = language
    return HttpResponseRedirect(request.META.get('HTTP_REFERER'))