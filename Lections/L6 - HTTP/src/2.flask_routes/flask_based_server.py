from flask import Flask, request

app = Flask(__name__)


@app.route('/hello')
def hello():
    # query-параметр ?name=...
    name = request.args.get('name', 'Anonymous')
    # заголовок запиту
    user_agent = request.headers.get('User-Agent')
    return f"Hello, {name}!<br>User-Agent: {user_agent}"


@app.route('/hello2', methods=['GET', 'POST'])
def hello2():
    # query (?name=) або тіло форми (name=)
    name = request.args.get('name', request.form.get('name', 'Anonymous'))
    user_agent = request.headers.get('User-Agent')
    x_token = request.headers.get('X-token')

    return (
        f"<font color='red'>"
        f"<p>Hello, {name}!</p>"
        f"<p>User-Agent: {user_agent}</p>"
        f"<p>X-token: {x_token}</p>"
        f"</font>"
    )


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8002)
