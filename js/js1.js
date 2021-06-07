
/*
Basic syntax
*/

console.log("JS basics");

/*
Data types, operations, and variables
*/

var a;
console.log('a=' + a);                       // a=undefined
console.log('typeof(a)=' + typeof (a));

var a = -2 * 3 + (8 - 3) * (5 + 1) + 3 ** 2;            // number
console.log('a=' + a);
console.log('typeof(a)=' + typeof (a));

var b = 3.14 * 2;                               // number
console.log('b=' + b);
console.log('typeof(b)=' + typeof (b));

var a = 5 / 3;                                  // as floating number division
console.log('5/3=' + a);
console.log('5/3=' + a.toFixed(2));           // take 2 digits after floating point, rounded 

// String
var s = "Johnson";
console.log('s=\"' + s + '"');

var s = "CP" + 4 + 7 + 6;    // numbers are converted to string 
console.log('s=\"' + s + '"');

var s = "1234"


// Boolean
var a = 2 == 2;
console.log('a=' + a);
console.log('typeof(a)' + typeof (a));
console.log(typeof (a) === 'boolean');


var b = false;
console.log('b=' + b);
console.log('typeof(b)=' + typeof (b));


// Undefined
var a = undefined;
console.log('a=' + a);
console.log('typeof(a)=' + typeof (a));


// Null
var a = null;
console.log('a=' + a);
console.log('typeof(a)=' + typeof (a));

// bigint type
var a = 2n ** 52n;
console.log('2n**52n=' + a);
console.log('typeof(a)=' + typeof (a));


// Functions
function sum(x, y) {
    return x + y;
}

function product(x, y) {
    var z = x * y
    return z;
}

x = 10, y = 20;
z = sum(x, y)
console.log('x=' + x + ", y=" + y);
console.log('z=sum(x,y)=' + z);
console.log('sum(x,y)=' + sum(x, y));
console.log('product(x,y)=' + product(x, y));


console.log("===========globle variable=============");
var a = 10;
function test() {
   console.log(a);
   a++;
}
test();
console.log(a);
console.log("===========globle variable=============");


console.log("===========auto globle variable=============");
function test1() {
   a = 14;
   console.log(a)
}
test1();
console.log(a);
console.log("===========auto globle variable=============");


console.log("===========local globle variable=============");
function test1() {
   let a = 10;
   console.log(a)
}
test1();
console.log(a);
console.log("===========local globle variable=============");






// Basic object as wraper of primtives
var a = new Number(245);
console.log('a:' + a);
console.log('typeof(a):' + typeof (a));

var a = new String("CP476");
console.log('a:' + a);
console.log('typeof(a):' + typeof (a));

var a = new Boolean(true);
console.log('a:' + a);
console.log('typeof(a):' + typeof (a));





// Math object
console.log('Math.PI=' + Math.PI);                  //  a property of Math object
console.log('Math.round(84.5)=' + Math.round(84.5));  // a method of Math object
console.log('Math.round(84.49)=' + Math.round(84.49));
console.log('Math.floor(84.5)=' + Math.floor(84.5));
console.log('Math.ceil(84.49)=' + Math.ceil(84.49));
console.log('Math.pow(2, 3)=' + Math.pow(2, 3));
console.log('Math.sqrt(64)=' + Math.sqrt(64));
console.log('Math.abs(-3.14)=' + Math.abs(-3.14));
console.log('Math.random()=' + Math.random());  // return random number between 0 and 1


// Array as object 
var a = ["CP", "476", "Internet", "Computing"];
// or var a = new Array("CP", "476", "Internet", "Computing");  // the same as the above
console.log('typeof(a)=' + typeof (a));
console.log('a.length:' + a.length);
console.log(a[0] + a[1] + " " + a[2] + " " + a[3]);


s = "";
for (i = 0; i < a.length; i++) {
    s += a[i] + " ";
}
console.log(s);

console.log("=====================");
var s = ""; 
var x;
for (x in a) {
  s += a[x] + "    ";
}
console.log(s);

var s = ""; 
i=0;
while (i < a.length) {
    s += a[i] + "     ";
    i++;
}
console.log(s);


function display(a) {
    for (i = 0; i < a.length; i++) {
        console.log(a[i]);
    }
}
console.log("=====================");

var a = new Array(3, 1, 4);
display(a);

a.sort();
display(a);

function inc(a) {
    for (i = 0; i < a.length; i++) {
        a[i]++;
    }
}
inc(a);
display(a);



a.forEach(myFunction);
function myFunction(value, index, array) {
  console.log(index + " " + value);
}


var b = a.map(myFunction2);
function myFunction2(value, index, array) {
  return value * 2;
}
display(b);


var c = b.filter(myFunction3);
function myFunction3(value, index, array) {
  return value >= 8;
}
display(c);

display(a);
var d = a.reduce(myFunction4);
function myFunction4(total, value, index, array) {
  return total + value;
}
console.log(d);

// Associated array as object
var a = { firstName: "Wilfrid", lastName: "Laurier" };
console.log('typeof(a)=' + typeof (a));
console.log(a["firstName"] + " " + a["lastName"]);
a = null;


// class as object
var person = {
    firstName: "H",
    lastName: "Fan",
    id: 12345,
    fullName: function () {
        return this.firstName + " " + this.lastName;
    }
};
console.log('person.fullName():' + person.firstName);
console.log('person.fullName():' + person.fullName()); 






// date

var a = new Date();
console.log('Date():' + a); 
console.log('getFullYear():' + a.getFullYear()); 

a.setFullYear(2020)
console.log('getFullYear():' + a.getFullYear()); 


var a = new Date(2018, 11, 24, 10);
console.log('Date(2018, 11, 24, 10):' + a); 

var a = new Date("October 13, 2014 11:13:00");
console.log('Date("October 13, 2014 11:13:00")' + a); 

var a = new Date("2015-03-25");
console.log('Date("2015-03-25")' + a); 



// Regular expression

var str = "CP476 Internet Computing";
var n = str.search("Internet");
console.log('search("Internet"):' + n); 
var n = str.search(/internet/i);  // case insentive
console.log('search(/internet/i):' + n); 

var res = str.replace("Internet", "internet");
console.log(res); 


var patt = /476/;
console.log('patt.test(str):'+patt.test(str)); 


// Exception 
try {
    throw "error======";
}
catch(err) {
    console.log(err); 
}



var hello = function() {
    console.log("Hello World!");
}

hello();


var hello1 = () => {
    console.log("Hello World!");
}
hello1();

hello2 = (val) => "Hello "+val;
console.log(hello2("CP476"));


console.log("=======JSON object===========");
var jsonstr = '{ "employees" : [' +
'{ "firstName":"John" , "lastName":"Doe" },' +
'{ "firstName":"Anna" , "lastName":"Smith" },' +
'{ "firstName":"Peter" , "lastName":"Jones" } ]}';

console.log(jsonstr);

var jsonObj = JSON.parse(jsonstr);
console.log(jsonObj.employees[0].firstName);

var jsonObj1 = jsonObj.employees[0];
for (x in jsonObj1) {
    console.log(x + " : " + jsonObj1[x]);
}




// classes
console.log("=======Class==========");
class Car {
    constructor(name, year) {
      this.name = name;
      this.year = year;
    }
    age() {
        let date = new Date();
        return date.getFullYear() - this.year;
    }
  }

  let mycar = new Car("Ford", 2014);
  console.log(mycar.name); 
  console.log(mycar.age()); 


  