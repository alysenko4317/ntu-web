import http.server
import socketserver

# define the port you want to run the server on
PORT = 8001   # http://localhost:8001/hello


# define the request handler class
class SimpleHandler(http.server.SimpleHTTPRequestHandler):
    def do_GET(self):
        print(f"self.path={self.path}")
        #if self.path == "/hello":
        if self.path.startswith("/hello"):
            self.send_response(200)
            self.send_header("Content-type", "text/plain")
            self.end_headers()
            self.wfile.write(b"<b>Hello, World!</b>")
        else:
            # for all other routes, serve files from the current directory
            super().do_GET()


# create the server
with socketserver.TCPServer(("", PORT), SimpleHandler) as httpd:
    print(f"Serving at port {PORT}")
    # start the server and keep it running until interrupted
    try:
        httpd.serve_forever()
    except KeyboardInterrupt:
        print("\nServer has been stopped.")
