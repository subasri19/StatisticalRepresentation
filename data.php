<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', '192.168.0.175');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'abcd1234');
define('DB_NAME', 'logger');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table

// $query = sprintf("select a.RegNum, sum(b.ReqPerSec) as sum from tempReq a cross join tempReq b where b.SlNo<=a.SlNo group by a.RegNum;");

$query = sprintf("select ceiling(AffectedTime/1000000) as sec_val, count(*) as cnt from request where mod(SlNo,2)=1 and SlNo<720 group by  ceiling(AffectedTime/1000000);");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);