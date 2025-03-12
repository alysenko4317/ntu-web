from django.db import models

from django.db import models

class User(models.Model):
    login = models.CharField(unique=True, max_length=50)
    password = models.CharField(max_length=100)  # You should adjust the max_length
    name = models.CharField(max_length=100)  # You should adjust the max_length

    def __str__(self):
        return self.name  # You can customize this representation as needed

class Session(models.Model):
    key = models.CharField(unique=True, max_length=100)
    user = models.ForeignKey(User, on_delete=models.CASCADE)
    expires = models.DateTimeField()


    def __str__(self):
        return f"Session for {self.user} (Key: {self.key})"

