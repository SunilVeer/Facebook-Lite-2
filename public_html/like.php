<?php
try {
	
// establish a database connection to mongodb	
include 'connection.php';

session_start();

$post_id = $_GET['post_id'];

$bulk = new MongoDB\Driver\BulkWrite;

$filter = ['_id' => new \Mongodb\BSON\ObjectID($post_id)];
$options = ['projection' => [],'sort' => [],];
$query = new MongoDB\Driver\Query($filter, $options);
$rows = $mng->executeQuery('FacebookLite.post', $query);

foreach($rows as $row){
	$found  = 0;
	foreach($row->likes as $like){
		if($like == $_SESSION['emailid']){
			$found = 1;
		}
	}

if(!$found){
$bulk->update(['_id' => new \Mongodb\BSON\ObjectID($post_id)],['$push'=> ['likes' => ['$each'=> [$_SESSION['emailid']]]]]);
$mng->executeBulkWrite('FacebookLite.post', $bulk);
}
}
header('Location: home.php');
}

catch (MongoDB\Driver\Exception\Exception $e) {

	                    $filename = basename(__FILE__);

							echo "The $filename script has experienced an error.\n";
							echo "It failed with the following exception:\n";
							echo "Exception:", $e->getMessage(), "\n";
							echo "In file:", $e->getFile(), "\n";
							echo "On line:", $e->getLine(), "\n";
}
?>
