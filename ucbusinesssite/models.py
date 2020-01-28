from django.db import models

class NewsArticle(models.Model):
    title = models.CharField(max_length=50, blank=False, verbose_name='Title')
    titleEn = models.CharField(max_length=50, blank=False, default='No translation', verbose_name='Title(EN)')
    body = models.TextField(blank=False, verbose_name='Body')
    bodyEn = models.TextField(blank=False, verbose_name='Body(EN)', default='No translation')
    datePosted = models.DateField(verbose_name='Date')

    class Meta:
        db_table = 'News_Articles'
        verbose_name = 'News Article'
        verbose_name_plural = 'News Articles'
        ordering = ["datePosted"]

    def __str__(self):
        return self.title + " - " + str(self.datePosted.strftime("%d/%m/%Y"))


class ImageUrl(models.Model):
    url = models.CharField(max_length=300)
    newsArticle = models.ForeignKey(NewsArticle, on_delete=models.CASCADE)

    class Meta:
        db_table = 'News_Images'
        verbose_name = 'News Article Image'
        verbose_name_plural = 'News Images'

    def __str__(self):
        return self.newsArticle.title + ' ('+ self.url +')'


class Role(models.Model):
    name = models.CharField(max_length=50, blank=False, primary_key=True)
    position = models.IntegerField(unique=True, blank=False)

    class Meta:
        db_table = 'Roles'
        verbose_name = 'Role'
        verbose_name_plural = 'Roles'
        ordering = ['position']

    def __str__(self):
        return self.name


class Member(models.Model):
    name = models.CharField(max_length=100, blank=False)
    email = models.EmailField(max_length=255 ,unique=True, blank=False)
    role = models.ForeignKey(Role, on_delete = models.PROTECT)
    image = models.ImageField(upload_to='ucbusinesssite/')

    class Meta:
        db_table = 'Members'
        verbose_name = 'Member'
        verbose_name_plural = 'Members'
        ordering = ['role','name']

    def __str__(self):
        return self.name + ' ('+ self.role.name +')'


class NonProfitAssociation(models.Model):
    name = models.CharField(max_length=100, blank=False, unique=True)
    image = models.CharField(max_length=500, blank=False, unique=True)

    class Meta:
        db_table = 'Non_Profit_Associations'
        verbose_name = 'Non-profit Association'
        verbose_name_plural = 'Non-profit Associations'
        ordering = ['name']

    def __str__(self):
        return self.name


class Events(models.Model):
    name = models.CharField(max_length=500, blank=False, verbose_name='Name')
    date = models.DateField(verbose_name='Date')

    class Meta:
        db_table = 'Events'
        verbose_name = 'Event'
        verbose_name_plural = 'Events'
        ordering = ['-date']

    def __str__(self):
        return self.name + ' ('+ str(self.date) +')'