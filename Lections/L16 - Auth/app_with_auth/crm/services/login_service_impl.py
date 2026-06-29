import random
import string
import hashlib

from datetime import datetime, timedelta
from ..models import User, Session

#import bcrypt

#def bcrypt_hash_with_salt(password):
#    # Generate a salt and hash the password using bcrypt
#    salt = bcrypt.gensalt()
#    hashed_password = bcrypt.hashpw(password.encode('utf-8'), salt)
#    return hashed_password.decode('utf-8')

def md5_hash(password):
    md5 = hashlib.md5()
    md5.update(password.encode('utf-8'))
    return md5.hexdigest()

def generate_long_random_key(length=64):
    # Generate a long random key for the session
    return ''.join(random.choice(string.ascii_letters + string.digits) for _ in range(length))

def do_login(login, password):
    try:
        user = User.objects.get(login=login)
    except User.DoesNotExist:
        return None

    #if not bcrypt.checkpw(password.encode('utf-8'), user.password.encode('utf-8')):
    ph = md5_hash(password)
    if user.password != md5_hash(password):
        return None

    session = Session()
    session.key = generate_long_random_key()
    session.user = user
    session.expires = datetime.now() + timedelta(days=5)
    session.save()

    return session.key
