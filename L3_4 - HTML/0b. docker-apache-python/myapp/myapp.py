from flask import Flask, request

app = Flask(__name__)

@app.route('/')
def index():
    return '''
    <html>
      <head><title>Demo Flask App</title></head>
      <body>
         <h1>Welcome to the Demo Flask App!</h1>
         <p>This is served from Flask via mod_wsgi.</p>
         <p>Try accessing <a href="/myapp/greet?name=John">/myapp/greet?name=John</a>.</p>
      </body>
    </html>
    '''

@app.route('/greet')
def greet():
    name = request.args.get('name', 'Guest')
    return f'<h2>Hello, {name}!</h2>'

if __name__ == '__main__':
    app.run()
