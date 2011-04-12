var http = require('http');
var url  = require('url');

/**
 * /echo
 *
 * Returns passed query as HTTP body.
 */
var resEcho = function (req, res) {
  var reqUrl = url.parse(req.url);

  res.writeHead(200, {'Content-Type': 'text/plain'});
  res.end(reqUrl.query);
};

var resHello = function (req, res) {
  var reqUrl = url.parse(req.url);

  res.writeHead(200, {'Content-Type': 'text/plain'});
  res.end('Hello, World!\n');
};

http.createServer(function (req, res) {
  var reqUrl = url.parse(req.url, true);

  switch (reqUrl.pathname) {
    case '/echo':
      resEcho(req, res);
      break;
    default:
      resHello(req, res);
  }
}).listen(8124, "127.0.0.1");

console.log('Server running at http://127.0.0.1:8124/');
