# Use the official Apache HTTP Server image from Docker Hub
FROM httpd:2.4

# Update packages and install Python3, pip, and mod_wsgi for Python 3
RUN apt-get update && apt-get install -y \
    python3 \
    python3-pip \
    libapache2-mod-wsgi-py3 && \
    rm -rf /var/lib/apt/lists/*

# Install Flask (or any other Python dependencies)
RUN pip3 install --break-system-packages flask

# Add directive to load mod_wsgi module into Apache.
# Note: The module path (/usr/lib/apache2/modules/mod_wsgi.so) may need verification.
RUN echo "LoadModule wsgi_module /usr/lib/apache2/modules/mod_wsgi.so" >> /usr/local/apache2/conf/httpd.conf

# Copy your static files into the Apache document root
COPY ./public-html/ /usr/local/apache2/htdocs/

# Copy your Python application into /var/www/myapp
COPY ./myapp/ /var/www/myapp/

# Copy the Apache configuration for WSGI
COPY ./myapp.conf /usr/local/apache2/conf/extra/

# Include the custom configuration in the main Apache config file
RUN echo "Include conf/extra/myapp.conf" >> /usr/local/apache2/conf/httpd.conf
