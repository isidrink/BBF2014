<?php
include 'config.php';

$link = mysql_pconnect("localhost", "root", "") or die("Unable To Connect To Database Server");
/*$link = mysql_pconnect($dbhost, $dbuser, $dbpass) or die("Unable To Connect To Database Server");*/

/*mysql_select_db($dbname) or die("Unable To Connect To Northwind");*/
mysql_select_db("bbf") or die("Unable To Connect To Northwind");

$arr = array();

$rs = mysql_query("select * from BBF2013 b ORDER BY b.CERVESERA");

while($obj = mysql_fetch_object($rs)) {

	$arr[] = $obj;

}

// add the header line to specify that the content type is JSON
header("Content-type: application/json");

echo "{\"data\":" .json_encode($arr). "}";

/*include 'config.php';

$sql = "select * from BBF2013 b ORDER BY b.CERVESERA ";

try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->query($sql);  
	$employees = $stmt->fetchAll(PDO::FETCH_OBJ);
	$dbh = null;
	header("Content-type: application/json");
	echo '{"items":'. json_encode($employees) .'}'; 
} catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}

*/
?>