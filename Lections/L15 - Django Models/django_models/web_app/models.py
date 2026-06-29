from django.db import models


class Bachelor(models.Model):

    class Meta:
        db_table = 'Bachelor'  # Set the custom table name for Bachelor

    name = models.TextField()
    course = models.TextField()

    def __str__(self):
        return f"{self.name} - {self.course} ({type(self)})"


class Master(models.Model):

    class Meta:
        db_table = 'Master'  # Set the custom table name for Bachelor

    name = models.TextField()
    course = models.TextField()

    def __str__(self):
        return f"{self.name} - {self.course} ({type(self)})"
