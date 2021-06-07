/*
File operations by nodejs
This needs fs module, it's included in the provided 
npm install fs
*/


var fs = require('fs');

// create and writeFile, nodejs style
fs.writeFile('test.txt', 'Hello World!\n', function (err) {
    if (err) console.log(err);
});


fs.appendFile('test.txt', 'hello, world!', function (err) {
    if (err)
        console.log(err);
    else
        console.log('Append operation complete.');
});

fs.readFile('test.txt', function (err, data) {
    if (err) throw err;
    console.log(data.toString());
});


try {
    var data = fs.readFileSync('test.txt', 'utf8');
    console.log(data);    
} catch(e) {
    console.log('Error:', e.stack);
}


// open, write, old style
fs.open('test1.txt', 'w', function (err, fd) {
    if (err) {
        return console.error(err);
    }
    let buffer = new Buffer.from("Hello\n");
    fs.write(fd, buffer, 0, buffer.length, null, function (err) {
        if (err) throw err;
    });

    s = ", world!";
    fs.write(fd, s, function (err) {
        if (err) throw err;
    });

    fs.close(fd, function (err) {
        if (err) throw err;
    });
});

// open, read, old style
fs.open('test.txt', 'r', function (err, fd) {
    if (err) {
        return console.error(err);
    }
    var buffer = new Buffer.alloc(1024);
    fs.read(fd, buffer, 0, buffer.length, 0, function (err, bytes) {
        if (err) throw err;

        console.log("File opened successfully!"); 
        console.log("reading the file"); 
        console.log(bytes + " bytes read"); 
        // Print only read bytes to avoid junk.
        if (bytes > 0) {
            console.log(buffer.slice(0, bytes).toString());
        }
        // Close the opened file.
    });

    fs.close(fd, function (err) {
        if (err) throw err;
    });
});


// delete files
/*
fs.unlink('test.txt', function () {
    console.log('delete complete.');
});
*/

console.log("=====read JSON file======");  
var data = fs.readFileSync('course.json', 'utf8');
console.log(data);   
var jsonObj = JSON.parse(data);
jsonObj1 = jsonObj[0]; 
for (x in jsonObj1) {
    console.log(x + " : " + jsonObj1[x]);
}