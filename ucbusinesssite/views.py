from django.views import View
from django.shortcuts import render
from django.http import HttpResponseRedirect, JsonResponse
from django.core.mail import send_mail, BadHeaderError

from .models import NewsArticle, Member, Events
from .forms import ContactForm
from ucbusiness import settings

from datetime import datetime
import json

months = {1: ('Janeiro', 'January', 31),
          2: ('Fevereiro', 'February', 28),
          3: ('Março', 'March', 31),
          4: ('Abril', 'April', 30),
          5: ('Maio', 'May', 31),
          6: ('Junho', 'June', 30),
          7: ('Julho', 'July', 31),
          8: ('Agosto', 'August', 31),
          9: ('Setembro', 'September', 30),
          10: ('Outubro', 'October', 31),
          11: ('Novembro', 'November', 30),
          12: ('Dezembro', 'December', 31)
          }

class Index(View):
    template_name = 'ucbusinesssite/index.html'

    def get(self, request):
        context = {}
        request.session['language'] = request.session.get('language', 'EN')
        request.session['cookieBanner'] = request.session.get('cookieBanner', True)
        news = NewsArticle.objects.all().order_by('-datePosted')
        if news:
            if len(news) >= 2:
                context['newsArticles'] = news[:2]
            else:
                context['newsArticles'] = news
            # newsArticle1 = news[0]
            # context['newsArticle1'] = newsArticle1
            # if newsArticle1.imageurl_set.all():
            #     context['image1'] = newsArticle1.imageurl_set.all().first()
            # if len(news) > 1:
            #     newsArticle2 = news[1]
            #     context['newsArticle2'] = newsArticle2
            #     if newsArticle2.imageurl_set.all():
            #         context['image2'] = newsArticle2.imageurl_set.all().first()
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
                send_mail('UC Business website form', 'Name: ' + name+'\n'+ 'E-mail: ' + email +'\n'+message, settings.EMAIL_HOST_USER, ['jfacc31@gmail.com'])
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


def hideCookieBanner(request):
    request.session['cookieBanner'] = False
    return JsonResponse({'value':'success'})


def changeLanguage(request):
    language = json.loads(request.body)
    request.session['language'] = language['value']
    return JsonResponse({'value':'success'})


def getEvents(request):
    data = json.loads(request.body)
    events = {}
    monthCounter = data['monthCounter']
    yearCounter = data['yearCounter']
    if request.session['language'] == 'PT':
        month = months[monthCounter][0]
    else:
        month = months[monthCounter][1]
    numDays = months[monthCounter][2]
    if monthCounter == 2 and datetime.now().year % 4 == 0:
        numDays += 1
    for event in Events.objects.filter(date__month=monthCounter, date__year=yearCounter):
        if request.session['language'] == 'PT':
            events[event.date.day] = event.name
        else:
            events[event.date.day] = event.nameEn
    return JsonResponse({'numDays':numDays, 'month': month, 'events': events})
