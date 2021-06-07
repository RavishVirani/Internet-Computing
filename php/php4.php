<?php 

/*
Hand-on PHP & MongoDB

References
https://github.com/roytuts/php-mongodb/tree/master/php-7-mongodb-crud
https://zetcode.com/db/mongodbphp/
*/

include_once 'MDBManager.php';

$dbname = 'cp476';
$collection = 'customers';

$dbm = new MDBManager();
$conn = $dbm->getConnection();

//list databases
$listdatabases = new MongoDB\Driver\Command(["listDatabases" => 1]);
$res = $conn->executeCommand("admin", $listdatabases);
$databases = current($res->toArray());
foreach ($databases->databases as $el) {
    echo $el->name . "\n";
}


//list collections
$listcollections = new MongoDB\Driver\Command(["listCollections" => 1]);
$res = $conn->executeCommand($dbname, $listcollections);
$tables = $res->toArray();
foreach ($tables as $el) {
    echo $el->name . "\n";
}
//print_r($tables);



// // create a collection/table
 $cmd = array();
 $cmd["create"] = "mycol";
 $cmd["capped"] = true;
 $cmd["size"] = 64*1024;
 $command = new MongoDB\Driver\Command($cmd);
 $res = $conn->executeCommand("mydb", $command);
 $response = $res->toArray();
 print_r($response );


// // insert
// $user1 = array(
//     'name' => 'HBF',
//     'address' => 'Waterloo'
// );
// $single_insert = new MongoDB\Driver\BulkWrite();
// $single_insert->insert($user1);
// $user2 = array(
//     'name' => 'XU',
//     'address' => 'Waterloo'
// );
// $mycol = "mycol";
// $single_insert->insert($user2);
// $conn->executeBulkWrite("$dbname.$mycol", $single_insert);


// // get all
// $filter = [];
// $option = [];
// $read = new MongoDB\Driver\Query($filter, $option);
// $mycol = "mycol";
// $all = $conn->executeQuery("$dbname.$mycol", $read);
// foreach ($all as $user) {
// 	echo nl2br($user->name.' '.$user->address."\n");
// }


//// find filter
// $filter = ['name' => 'HBF'];
// $option = [];
// $read = new MongoDB\Driver\Query($filter, $option);
//$mycol = "mycol";
// $single = $conn->executeQuery("$dbname.$mycol", $read);
// foreach ($single as $user) {
// 	echo nl2br($user->name.' '.$user->address."\n");
// }


//// delete data
// $deletes = new MongoDB\Driver\BulkWrite();
// $deletes->delete(
//     ['name' => 'HBF'],
//     ['limit' => 1]
// );
//$mycol = "mycol";
// $result = $conn->executeBulkWrite("$dbname.$mycol", $deletes);
// if($result) {
// 	echo nl2br("Record deleted successfully \n");
// }

//// update
// $updates = new MongoDB\Driver\BulkWrite();
// $updates->update(
//     ['name' => 'XU'],
//     ['$set' => ['name' => 'Fan', 'address' => 'Toronto']],
//     ['multi' => true, 'upsert' => true]
// );
//$mycol = "mycol";
// $result = $conn->executeBulkWrite("$dbname.$mycol", $updates);
// if($result) {
// 	echo nl2br("Record updated successfully \n");
// }


// // drop a collection
// $mycol = "mycol";
// $res = $conn->executeCommand($dbname, new \MongoDB\Driver\Command(["drop" => $mycol]));
// print_r($res->toArray());


// // drop a database
// $mycol = "testdb";
// $res = $conn->executeCommand("admin", new \MongoDB\Driver\Command(["drop" => $mycol]));
// print_r($res->toArray());

?>