from django.db import models

class NewsArticle(models.Model):
    title = models.CharField(max_length=100, blank=False, verbose_name='Title')
    titleEn = models.CharField(max_length=100, blank=False, verbose_name='Title(EN)')
    body = models.TextField(blank=False, verbose_name='Body')
    bodyEn = models.TextField(blank=False, verbose_name='Body(EN)')
    datePosted = models.DateField(blank=False, verbose_name='Date')

    class Meta:
        db_table = 'News_Articles'
        verbose_name = 'News Article'
        verbose_name_plural = 'News Articles'
        ordering = ["-datePosted"]

    def __str__(self):
        return self.title + " - " + str(self.datePosted.strftime("%d/%m/%Y"))


class ImageUrl(models.Model):
    url = models.CharField(max_length=300, verbose_name='Image URL')
    newsArticle = models.ForeignKey(NewsArticle, on_delete=models.CASCADE, verbose_name='News Article')

    class Meta:
        db_table = 'News_Images'
        verbose_name = 'News Article Image'
        verbose_name_plural = 'News Images'

    def __str__(self):
        return self.newsArticle.title + ' ('+ self.url +')'


class Role(models.Model):
    name = models.CharField(max_length=50, blank=False, primary_key=True, verbose_name='Name')
    nameEn = models.CharField(max_length=50, blank=False, verbose_name='Name(EN)')
    position = models.IntegerField(unique=True, blank=False, verbose_name='Position')

    class Meta:
        db_table = 'Roles'
        verbose_name = 'Role'
        verbose_name_plural = 'Roles'
        ordering = ['position']

    def __str__(self):
        return self.name


class Member(models.Model):
    name = models.CharField(max_length=100, blank=False, verbose_name='Name')
    email = models.EmailField(max_length=255 ,unique=True, blank=False, verbose_name='E-mail')
    role = models.ForeignKey(Role, on_delete = models.PROTECT, verbose_name='Role')
    image = models.ImageField(upload_to='ucbusinesssite/', verbose_name='Image')

    class Meta:
        db_table = 'Members'
        verbose_name = 'Member'
        verbose_name_plural = 'Members'
        ordering = ['role','name']

    def __str__(self):
        return self.name + ' ('+ self.role.name +')'


class Events(models.Model):
    name = models.CharField(max_length=500, blank=False, verbose_name='Name')
    nameEn = models.CharField(max_length=500, blank=False, verbose_name='Name(EN)')
    date = models.DateField(verbose_name='Date')

    class Meta:
        db_table = 'Events'
        verbose_name = 'Event'
        verbose_name_plural = 'Events'
        ordering = ['-date']

    def __str__(self):
        return self.name + ' ('+ str(self.date) +')'
