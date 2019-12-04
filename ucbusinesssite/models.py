from django.db import models

class AboutText(models.Model):
    title = models.CharField(max_length=50, blank=False)
    body = models.TextField(max_length=500, blank=False)

    class Meta:
        db_table = 'AboutText'
        verbose_name = 'Text'
        verbose_name_plural = 'About Texts'
        ordering = ['title']


class NewsArticle(models.Model):
    title = models.CharField(max_length=50, blank=False)
    body = models.TextField(blank=False)
    imgUrl = models.CharField(max_length=500)
    class Meta:
        db_table = 'NewsArticle'
        verbose_name = 'News Article'
        verbose_name_plural = 'News'
        ordering = ["title"]


class Position(models.Model):
    name = models.CharField(max_length=50, blank=False, primary_key=True)

    class Meta:
        db_table = 'Position'
        verbose_name = 'Position'
        verbose_name_plural = 'Positions'
        ordering = ['name']

class Member(models.Model):
    name = models.CharField(max_length=100, blank=False)
    email = models.EmailField(max_length=255 ,unique=True, blank=False)
    position = models.ForeignKey(Position, on_delete = models.PROTECT)
    image = models.ImageField(upload_to='ucbusinesssite/')

    class Meta:
        db_table = 'Member'
        verbose_name = 'Member'
        verbose_name_plural = 'Members'
        ordering = ['name']