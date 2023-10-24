from flask import Flask, jsonify, request
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # This will enable CORS for all routes

# By using the CORS function as shown above, you're allowing any origin
# to access your API. If you want to restrict access to specific origins,
# you can provide a list of allowed origins:
#    CORS(app, origins=["http://example.com", "http://sub.example.com"])

# ---------------------------------------------------
# route 1
# ---------------------------------------------------

@app.route('/getMenu')
def get_menu():
    menuItems = [
        'Appetizer',
        'Salad',
        'Main Course',
        'Dessert',
        'Drink'
    ]
    return jsonify(menuItems)

# ---------------------------------------------------
# route 2
# ---------------------------------------------------

@app.route('/getListItems', methods=['GET'])
def get_list_items():
    version = request.args.get('version')

    listItems_v1 = [
        {
            "title": "IPZ-22-1",
            "href": "https://ipz221.ztu.edu.ua"
        },
        {
            "title": "IPZ-22-2",
            "href": "https://ipz222.ztu.edu.ua"
        },
        {
            "title": "IPZ-22-3",
            "href": "https://ipz223.ztu.edu.ua"
        }
    ]

    listItems_v2 = [
        {
            "title": "IPZ-23-1",
            "href": "https://ipz231.ztu.edu.ua"
        },
        {
            "title": "IPZ-23-2",
            "href": "https://ipz232.ztu.edu.ua"
        },
        {
            "title": "IPZ-23-3",
            "href": "https://ipz233.ztu.edu.ua"
        }
    ]

    if version == "v2":
        return jsonify(listItems_v2)
    else:
        return jsonify(listItems_v1)

# ---------------------------------------------------

if __name__ == "__main__":
    app.run(debug=True, port=8080)
