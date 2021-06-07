
// require: express module, can be installed : npm install express
// require: jade module, can be installed : npm install jade
// create a views directory, and index.jade file
// usage: node express_jade_server.js
// test: http://localhost:3000/

// Jade example
var express = require('express');
const port = 3000;
var app = express();
app.set('view engine', 'jade');
app.get('/', function (req, res) {
    res.render('index', { title: 'Jade test', message: 'Jade header', message1: 'Jade paragraph' })
});
var server = app.listen(port, function () { console.log("express server is up") });

