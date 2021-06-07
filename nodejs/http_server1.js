/*
 *  Hand-on Node.js web server 
 *  This contains a list of simple node.js web server examples
 *  Test & run: 
 *   1. Uncomment each block, 
 *   2. Type and run: node http_server1.js
 *   3. Open the provided URL in browser
*/

const http = require('http');
const port = 3000;
const host = 'localhost';


//create a simple web server object
http.createServer(function (req, res) {
    res.write('Hello World!'); //write a response to the client
    res.end(); //end the response
  }).listen(port); //the server object listens on port
// browsesr url:  http://localhost:3000/
// command line:  curl http://localhost:3000/


// //create a server object and write header
// http.createServer(function (req, res) {
//   res.writeHead(200, {'Content-Type': 'text/html'});
//   res.write('hello, world!'); 
//   res.end(); 
// }).listen(port, host); 
// // http://localhost:3000/


// // Read the Query String
// http.createServer(function (req, res) {
//   res.writeHead(200, {'Content-Type': 'text/html'});
//   res.write(req.url);
//   res.end();
// }).listen(port, host, () => {console.log(`Server is running on http://${host}:${port}`)}); 
// // http://localhost:3000/test


// // Split the Query String
// const url = require('url');
// http.createServer(function (req, res) {
//   res.writeHead(200, {'Content-Type': 'text/html'});
//   var q = url.parse(req.url, true).query;
//   console.log(q);
//   for(var key in q) {
//     res.write(key + ':' + q[key] + '<br>');
//   }
//   res.end("this is the end");
// }).listen(port);
// // http://localhost:3000/?a=1&b=2 or http://localhost:3000/test?a=1&b=2


// // read files, create hello.html and put in the same folder
// var fs = require('fs');
// http.createServer(function (req, res) {
//   fs.readFile('hello.html', function(err, data) {
//     res.writeHead(200, {'Content-Type': 'text/html'});
//     res.write(data);
//     return res.end();
//   });
// }).listen(port);
// // http://localhost:3000/



// // read get html document
// var url = require('url');
// var fs = require('fs');
// http.createServer(function (req, res) {
//   var q = url.parse(req.url, true);
//   console.log(q.pathname);
//   var filename = "." + q.pathname;
//   fs.readFile(filename, function(err, data) {
//     if (err) {
//       res.writeHead(404, {'Content-Type': 'text/html'});
//       return res.end("404 Not Found");
//     } 
//     res.writeHead(200, {'Content-Type': 'text/html'});
//     res.write(data);
//     return res.end();
//   });
// }).listen(port);
// // http://localhost:3000/hello.html



// // upload file
// //  require to install formidable module :   npm install formidable
// // create a folder upload 
// var formidable = require('formidable');
// var fs = require('fs');
// http.createServer(function (req, res) {
//   if (req.url == '/fileupload') {
//     var form = new formidable.IncomingForm();
//     form.parse(req, function (err, fields, files) {
//       var oldpath = files.filetoupload.path;
//       console.log(oldpath);
//       var newpath = './upload/' + files.filetoupload.name;
//       fs.rename(oldpath, newpath, function (err) {
//         if (err) throw err;
//         res.write('File uploaded and moved!');
//         res.end();
//       });
//  });
//   } else {
//     res.writeHead(200, {'Content-Type': 'text/html'});
//     res.write('<form action="fileupload" method="post" enctype="multipart/form-data">');
//     res.write('<input type="file" name="filetoupload"><br>');
//     res.write('<input type="submit">');
//     res.write('</form>');
//     return res.end();
//   }
// }).listen(port);
// // http://localhost:3000/

