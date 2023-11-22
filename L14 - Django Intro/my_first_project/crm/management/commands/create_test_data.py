from django.core.management.base import BaseCommand
from crm.models import Category, PostStatus, Tag, Post
from datetime import datetime

class Command(BaseCommand):
    help = 'Generate test data and save it to the database.'

    def handle(self, *args, **kwargs):
        # Generate test data and save it to the database
        category1 = Category.objects.create(title='Category 1')
        category2 = Category.objects.create(title='Category 2')
        post_status1 = PostStatus.objects.create(views=100, likes=50)
        post_status2 = PostStatus.objects.create(views=100, likes=50)
        tag1 = Tag.objects.create(title='Tag 1')
        tag2 = Tag.objects.create(title='Tag 2')

        post1 = Post.objects.create(
            title='Post 1',
            content='Content for Post 1',
            creation_date=datetime.now(),
            category=category1,
            status=post_status1,
        )
        post1.tags.add(tag1, tag2)

        post2 = Post.objects.create(
            title='Post 2',
            content='Content for Post 2',
            creation_date=datetime.now(),
            category=category2,
            status=post_status2,
        )
        post2.tags.add(tag1)
