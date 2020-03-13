from django.contrib import admin
from .models import NewsArticle, ImageUrl, Role, Member, Events

admin.site.site_header = 'UC Business'

class ImageUrlInline(admin.TabularInline):
    model = ImageUrl

class NewsArticleAdmin(admin.ModelAdmin):
    inlines = [ImageUrlInline,]
    list_display = ('title', 'datePosted')

class EventsAdmin(admin.ModelAdmin):
    list_display = ('name', 'date')

class MemberAdmin(admin.ModelAdmin):
    list_display = ('name', 'email','role')

admin.site.register(NewsArticle, NewsArticleAdmin)
admin.site.register(Role)
admin.site.register(Member, MemberAdmin)
admin.site.register(Events, EventsAdmin)
