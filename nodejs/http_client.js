//https://zetcode.com/javascript/http/

const http = require('http');

const options = {
    hostname: 'localhost',
    port: 3000,
    path: '/',
    method: 'GET'
};

const req = http.request(options, (res) => {
    console.log(`statusCode: ${res.statusCode}`);
    res.on('data', (d) => {
        process.stdout.write(d);
    });
});

req.on('error', (err) => {
    console.error(err);
});
req.end();


// const req = http.get({ host: 'localhost', port: "3000", path: '/' }, (res) => {

//     // Continuously update stream with data
//     let content = '';

//     res.on('data', (chunk) => {
//         content += chunk;
//     });

//     res.on('end', () => {

//         console.log(content);
//     });
// });

// req.end();



// let payload = JSON.stringify({
//     num1: '1',
//     num2: '2'
// });

// let headers = {
//     'Content-Type': 'text/html',
//     'Content-Length':  payload.length  //. Buffer.byteLength(payload, 'utf8')
// };

// let options = {
//     host: 'localhost',
//     port: '80',
//     path: '/cp476/examples/php/sum_get.php',
//     method: 'GET',
//     headers: headers
// };

// let reqPost = http.request(options, (res) => {
//     console.log("status code: ", res.statusCode);
//     res.on('data', (chunks) => {
//         process.stdout.write(chunks);
//     });
// });

// reqPost.write(payload);
// reqPost.end();

// reqPost.on('error', (err) => {
//     console.error(err);
// });