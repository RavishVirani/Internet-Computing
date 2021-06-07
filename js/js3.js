/*
MySQL operations by nodejs
This needs mysql module, can be installed by npm command
npm install mysql
*/

var mysql = require('mysql');

// connection
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: ""
});

con.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");

    con.end(function (err) {
        if (err) console.log(err.message);
        console.log("Disconnected");
    });
});


// create database
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: ""
});
con.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");

    con.query("CREATE DATABASE mydb", function (err, result) {
        if (err) throw err;
        console.log("Database created");
    });

    con.end(function (err) {
        if (err) console.log(err.message);
        console.log("Disconnected");
    });
});


// drop database
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: ""
});
con.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");

    con.query("DROP DATABASE mydb", function (err, result) {
        if (err) throw err;
        console.log("Database deleted");
    });

    con.end(function (err) {
        if (err) console.log(err.message);
        console.log("Disconnected");
    });
});


// SQL create table, insert, select 
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "mydb"
});

con.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");

    var sql = "CREATE TABLE customers (name VARCHAR(255), address VARCHAR(255))";
    con.query(sql, function (err, result) {
        if (err) throw err;
        console.log("Table created");
    });

    var sql = "INSERT INTO customers (name, address) VALUES ('WLU', 'Waterloo')";
    con.query(sql, function (err, result) {
        if (err) throw err;
        console.log("1 record inserted");
    });
    con.query("SELECT * FROM customers", function (err, result, fields) {
        if (err) throw err;
        console.log(result);
    });
    con.end(function (err) {
        if (err) console.log(err.message);
        console.log("Disconnected");
    });
});


// SQL select
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "mydb"
});

con.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");

    var sql = "SELECT * FROM customers";
    con.query(sql, function (err, result, fields) {
        if (err) throw err;
        console.log(result);
        con.end(function (err) {
            if (err) console.log(err.message);
            console.log("Disconnected");
        });
    });
});


// drop table
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "mydb"
});

con.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");

    var sql = "DROP TABLE customers";
    con.query(sql, function (err, result, fields) {
        if (err) throw err;
        console.log(result);
        con.end(function (err) {
            if (err) console.log(err.message);
            console.log("Disconnected");
        });
    });
});

/*
Reference:  https://www.w3schools.com/nodejs/nodejs_mysql.asp
*/ 

