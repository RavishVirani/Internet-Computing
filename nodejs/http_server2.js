/*
 *  Hand-on Node.js web server, modularized style
 *  This contains a list of simple node.js web server examples
 *  Test & run: 
 *   1. Uncomment each block, 
 *   2. Type and run: node http_server2.js
 *   3. Open the provided URL in browser
*/

var http = require('http');
const port = 3000;
const host = 'localhost';

// simple modularized style
const requestListener = function (req, res) {
  res.writeHead(200);
  res.end("http server 2");
};
const server = http.createServer(requestListener);
server.listen(port, host, () => {
  console.log(`Server is running on http://${host}:${port}`);
});
// browsesr url:  http://localhost:3000/
// command line:  curl http://localhost:3000/


//// simple HTML
// const requestListener = function (req, res) {
//   res.setHeader("Content-Type", "text/html");
//   res.writeHead(200);
//   res.end(`<html><body><h1>This is HTML</h1></body></html>`);
// };
// const server = http.createServer(requestListener);
// server.listen(port, host, () => {
//   console.log(`Server is running on http://${host}:${port}`);
// });
// // http://localhost:3000/


//// HTML document, using promises
// const fs = require('fs').promises;
// const requestListener = function (req, res) {
//   fs.readFile(__dirname + "/hello.html")
//       .then(contents => {
//           res.setHeader("Content-Type", "text/html");
//           res.writeHead(200);
//           res.end(contents);
//       })
//       .catch(err => {
//           res.writeHead(500);
//           res.end(err);
//           return;
//       });
// };
// const server = http.createServer(requestListener);
// server.listen(port, host, () => {
//   console.log(`Server is running on http://${host}:${port}`);
// });
// // http://localhost:3000/


//// get HTML pages 
// const fs = require('fs');
// const url = require('url');
// const requestListener = function (req, res) {
//   let pathname = url.parse(req.url).pathname;
//   console.log(`Request for ${pathname} received`);
//   if (pathname == '/') {
//     pathname = './index.html';
//   }
//   fs.readFile('./' + pathname.substr(1), (err, data) => {
//     if (err) {
//       console.error(err);
//       res.writeHead(404, { 'Content-Type': 'text/plain' });
//       res.write('404 - file not found');
//     } else {
//       res.writeHead(200, { 'Content-Type': 'text/html' });
//       res.write(data.toString());
//     }
//     res.end();
//   }
//   )}
// const server = http.createServer(requestListener);
// server.listen(port, host, () => {
//   console.log(`Server is running on http://${host}:${port}`);
// });
// // http://localhost:3000/
// // http://localhost:3000/hello.html




//// simple JSON
// const requestListener = function (req, res) {
//   res.setHeader("Content-Type", "application/json");
//   res.writeHead(200);
//   res.end(`{"message": "This is a JSON response"}`);
// };
// const server = http.createServer(requestListener);
// server.listen(port, host, () => {
//   console.log(`Server is running on http://${host}:${port}`);
// });
// //  http://localhost:3000/


//// JSON, RESTful
// const books = JSON.stringify([
//   { author: "Robert W. Sebesta", title: "Programming the World Wide Web, 5th edition"},
//   { author: "Luke Welling, Laura Thomson", title: "PHP and MySQL Web Development, Fifth Edition"}
// ]);
// const courses = JSON.stringify([
//   { cid: "CP476", title: "Internet Computing" },
//   {"cid": "CP372", "title": "Computer Networks"}
// ]);
// const requestListener = function (req, res) {
//   res.setHeader("Content-Type", "application/json");
//   switch (req.url) {
//       case "/":
//           res.writeHead(200, { 'Content-Type': 'text/html' });
//           res.write('<html><body><p>This is home page.</p></body></html>');
//           res.end();
//           break;
//       case "/books":
//           res.writeHead(200);
//           res.end(books);
//           break
//       case "/courses":
//           res.writeHead(200);
//           res.end(courses);
//           break
//       default:
//           res.writeHead(404);
//           res.end(JSON.stringify({error:"Resource not found"}));
//   }
// }
// const server = http.createServer(requestListener);
// server.listen(port, host, () => {
//   console.log(`Server is running on http://${host}:${port}`);
// });
// // http://localhost:3000/books
// // http://localhost:3000/courses


// // simple XML
// const requestListener = function (req, res) {
//   res.setHeader("Content-Type", "application/xml");
//   res.writeHead(200);
//   res.end(`<course><cid>CP476</cid><title>Internet Computing</title></course>`);
// };
// const server = http.createServer(requestListener);
// server.listen(port, host, () => {
//   console.log(`Server is running on http://${host}:${port}`);
// });
// // http://localhost:3000/


//// simple CSV
// const requestListener = function (req, res) {
// res.setHeader("Content-Type", "text/csv");
// res.setHeader("Content-Disposition", "attachment;filename=oceanpals.csv");
// res.writeHead(200);
// res.end(`id,name,email\n1,Sammy Shark,shark@ocean.com`);
// };
// const server = http.createServer(requestListener);
// server.listen(port, host, () => {
//   console.log(`Server is running on http://${host}:${port}`);
// });
// //  http://localhost:3000/


//// use url modol
// const url = require('url');
// const requestListener = function (req, res) {
//     let q = url.parse(req.url, true).query;
//     let msg = `${q.cid}`;
//     res.writeHead(200, { 'Content-Type': 'text/plain' });
//     res.write(msg);
//     res.end();
// }
// const server = http.createServer(requestListener);
// server.listen(port, host, () => {
//   console.log(`Server is running on http://${host}:${port}`);
// });
// // http://localhost:3000/course?cid=cp476

