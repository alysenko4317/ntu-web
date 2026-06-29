from django.db import models


class Category(models.Model):
   title = models.CharField(max_length=255)
   def __str__(self):
       return self.title


class PostStatus(models.Model):
    views = models.PositiveIntegerField(default=0)
    likes = models.PositiveIntegerField(default=0)


class Tag(models.Model):
    title = models.CharField(max_length=255)

    def __str__(self):
        return self.title


class Post(models.Model):
   title = models.CharField(max_length=255)
   content = models.TextField()
   creation_date = models.DateTimeField(blank=True)

   category = models.ForeignKey(Category, null=True, on_delete=models.SET_NULL)
   status = models.OneToOneField(PostStatus, null=True, on_delete=models.SET_NULL)
   tags = models.ManyToManyField(Tag)

   def __unicode__(self):
       return self.title

   class Meta:
       db_table = 'blogposts'
       ordering = ['-creation_date']
