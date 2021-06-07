### Simple PHP RESTful WS 

This PHP RESTful example is from http://phppot.com/php/php-restful-web-service/ with minor modification. 

## About the WS

This RESTful WS provides information of mobile device information defined in array:
$mobiles = array(
    1 => 'Apple iPhone 6S',  
    2 => 'Samsung Galaxy S6',  
    3 => 'Apple iPhone 6S Plus',  			
    4 => 'LG G4',  			
    5 => 'Samsung Galaxy S6 edge',  
    6 => 'OnePlus 2');

## How to access

### Access directly by URL

It can be called directly like the following to list all devices in the list
http://localhost/cp476/examples/rest/RestController.php?view=all
or get device name by id like
http://localhost/cp476/examples/rest/RestController.php?view=single&id=1


### Access directly by RESTful style API 

It can also be accessed by RESTful API like
http://localhost/cp476/examples/rest/mobile/list/
http://localhost/cp476/examples/rest/mobile/show/1/

Here relative URI mobile/list  and mobile/show/id/  are defined in .htaccess for using


### Access by AJAX

http://localhost/cp476/examples/rest/hello_rest.html](http://localhost/cp476/examples/rest/hello_rest.html

The AJAX access can be from anywhere. 



