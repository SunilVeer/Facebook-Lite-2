<?php
try {
// establish a database connection to mongodb
include 'connection.php';
session_start();
$friend_email = $_GET['email'];

$bulk = new MongoDB\Driver\BulkWrite;
$bulk->delete(['email1' => $_SESSION['emailid']],['email2' => $friend_email]);
$mng->executeBulkWrite('FacebookLite.friend', $bulk);

$bulk = new MongoDB\Driver\BulkWrite;
$bulk->delete(['email1' => $friend_email],['email2' => $_SESSION['emailid']]);
$mng->executeBulkWrite('FacebookLite.friend', $bulk);

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
