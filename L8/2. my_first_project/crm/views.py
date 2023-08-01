from django.shortcuts import render

# Create your views here.
from django.http import HttpResponse
from crm.models import *

from django.shortcuts import render, get_object_or_404, redirect
from .models import Category, PostStatus, Tag, Post
from .forms import PostForm

# View to create a new post
def create_post(request):
    if request.method == 'POST':
        form = PostForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('view_post', pk=form.instance.pk)
    else:
        form = PostForm()
    return render(request, 'create_post.html', {'form': form})

# View to view a post by its primary key (pk)
def view_post(request, pk):
    post = get_object_or_404(Post, pk=pk)
    return render(request, 'view_post.html', {'post': post})

# View to update a post by its primary key (pk)
def update_post(request, pk):
    post = get_object_or_404(Post, pk=pk)
    if request.method == 'POST':
        form = PostForm(request.POST, instance=post)
        if form.is_valid():
            form.save()
            return redirect('view_post', pk=post.pk)
    else:
        form = PostForm(instance=post)
    return render(request, 'update_post.html', {'form': form, 'post': post})

# View to delete a post by its primary key (pk)
def delete_post(request, pk):
    post = get_object_or_404(Post, pk=pk)
    if request.method == 'POST':
        post.delete()
        return redirect('create_post')
    return render(request, 'delete_post.html', {'post': post})

def all_posts(request):
    posts = Post.objects.all()
    return render(request, 'all_posts.html', {'posts': posts})


def index(request):
    return HttpResponse("<html><body><h1>Hello World</h1></body></html>")
