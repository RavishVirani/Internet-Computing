// var express = require('express');
// const port = 3000;
// const host = 'localhost';
// var app = express();
// var fs = require("fs");

// app.get('/user/list', function (req, res) {
//    fs.readFile( "./users.json", 'utf8', function (err, data) {
//       console.log( data );
//       res.end( data );
//    });
// })

// var server = app.listen(port, host, function () {
//    var host = server.address().address
//    var port = server.address().port
//    console.log("listening at http://%s:%s", host, port)
// })
// // http://localhost:3000/user/list



var express = require('express');
var app = express();
var fs = require("fs");
const port = 3000;
const host = 'localhost';

var user =  {
      "name" : "john",
      "role" : 3
   }

app.get('/user/list', function (req, res) {
   fs.readFile( "./users.json", 'utf8', function (err, data) {
      console.log( data );
      res.end( data );
   });
})   
app.post('/addUser', function (req, res) {
   fs.readFile( "./users.json", 'utf8', function (err, data) {
      dataobj = JSON.parse(data);
      dataobj[dataobj.length] = user;
      //console.log( data );
      console.log( dataobj.length);

      try {
         fs.writeFileSync("./users.json", JSON.stringify(dataobj));
       } catch (err) {
         console.error(err)
       }

      res.end(JSON.stringify(dataobj));
      //res.end( data );
   });
   
})

var server = app.listen(port, host, function () {
   var host = server.address().address
   var port = server.address().port
   console.log("Example app listening at http://%s:%s", host, port)
})
// http://localhost:3000/addUser