
// require: express module, can be installed : npm install express
// usage: node express_server.js

var express = require('express');

var app = express();
app.get('/', function(req, res){
   res.send("Hello world!");
});
app.listen(3000);



// // simple web server by express
// // usage: node express_server.js
// var path = require('path');
// const port = 3000;
// const host = 'localhost';
// var app = express();
// app.get('/test', function (req, res) {
//     value = "";
//     for (const key in req.query) {
//         console.log(key, req.query[key]);
//         value = value + ' ' + req.query[key]; 
//     }
//     res.send('hello, get method ' + value );
// });
// // get html file
// app.get('/', function(req, res) {
//     res.sendFile(path.join( __dirname + '/express.html'));
// });
// // the following to get query by post method
// app.use(express.urlencoded({
//     extended: true
//   }));
// app.post('/test2', function (req, res) {
//     console.log(req.body);
//     value = "";
//     for (const key in req.body) {
//         console.log(key, req.body[key]);
//         value = value + ' ' + req.body[key]; 
//     }
//     res.send('hello, post method ' + value);
//   })
// var server = app.listen(port, function () { console.log("express server is up") });
// // http://localhost:3000/test
// // http://localhost:3000/test?a=10
// // http://localhost:3000/ 



// // express using route
// const port = 3000;
// var app = express();
// app.route('/books').get(function (req, res) {
//     res.send("list of books");
// });
// app.route('/courses').get(function (req, res) {
//     res.send("list of courses");
// });
// app.get('/', function (req, res) {
//     res.send('help info');
// });
// var server = app.listen(port, function () { console.log("express server is up") });
// // http://localhost:3000/books
// // http://localhost:3000/courses
// // http://localhost:3000/

