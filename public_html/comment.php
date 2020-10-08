<?php
try {
// establish a database connection to mongodb
include 'connection.php';

session_start();

//proceed only if comment is not null
if ($_POST['comment'] != ""){
$post_id = $_GET['post_id'];

$bulk = new MongoDB\Driver\BulkWrite;
$comment = $_SESSION['emailid'].' : '.$_POST['comment'];
$bulk->update(['_id' => new \Mongodb\BSON\ObjectID($post_id)],['$push'=> ['comments' => ['$each'=> [$comment]]]]);
$mng->executeBulkWrite('FacebookLite.post', $bulk);
}

header ('Location: home.php');
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


