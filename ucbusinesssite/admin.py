from django.contrib import admin
from .models import NewsArticle, ImageUrl, Role, Member, Events

admin.site.site_header = 'UC Business'

class ImageUrlInline(admin.TabularInline):
    model = ImageUrl

class NewsArticleAdmin(admin.ModelAdmin):
    inlines = [ImageUrlInline,]

admin.site.register(NewsArticle, NewsArticleAdmin)
admin.site.register(Role)
admin.site.register(Member)
admin.site.register(Events)
