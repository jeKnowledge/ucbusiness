from django.contrib import admin
from .models import NewsArticle, ImageUrl, Role, Member, NonProfitAssociation

admin.site.register(NewsArticle)
admin.site.register(ImageUrl)
admin.site.register(Role)
admin.site.register(Member)
admin.site.register(NonProfitAssociation)
