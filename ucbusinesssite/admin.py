from django.contrib import admin
from .models import NewsArticle, ImageUrl, Role, Member

admin.site.register(NewsArticle)
admin.site.register(ImageUrl)
admin.site.register(Role)
admin.site.register(Member)
