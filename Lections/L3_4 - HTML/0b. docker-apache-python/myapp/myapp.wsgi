#!/usr/bin/env python3
import sys
import logging

logging.basicConfig(stream=sys.stderr)

# Add your application directory to sys.path
sys.path.insert(0, "/var/www/myapp")

# Import the Flask application (make sure your myapp.py defines "app")
from myapp import app as application
