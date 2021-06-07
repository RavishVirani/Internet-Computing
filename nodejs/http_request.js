var request = require("request");
var uri = "http://localhost/cp476/index.html";
request(uri, function(error,response,body)
{
    console.log(body);
});


// var express=require('express');
// var app=express();
// app.get('/',function(req,res)
// {
// res.send('Hello World!');
// });
// var server=app.listen(3000,function() {});