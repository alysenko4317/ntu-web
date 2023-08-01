from flask import Flask, request

app = Flask(__name__)   # create a Flask app


# define a route and the associated view function
@app.route('/hello')
def hello():
    # accessing query parameters:
    #    get the value of the 'name' query parameter
    name = request.args.get('name', 'Anonymous')
    # accessing headers
    #    get the value of the 'User-Agent' header
    user_agent = request.headers.get('User-Agent')
    return f"Hello, {name}!\nUser-Agent: {user_agent}"


# define a route and the associated view function
@app.route('/hello2', methods=['GET', 'POST'])
def hello2():
    # accessing query parameters or form data
    name = request.args.get('name', request.form.get('name', 'Anonymous'))

    # accessing headers
    user_agent = request.headers.get('User-Agent')  # Get the value of the 'User-Agent' header
    x_token = request.headers.get('X-token')  # Get the value of the 'X-token' header

    return f"Hello, {name}!\nUser-Agent: {user_agent}\nX-token: {x_token}\n"


# run the app if this script is executed directly
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8002)

