<?php
try {
// establish a database connection to mongodb
include 'connection.php';
session_start();

$friend_email = $_GET['email']; 
$date = Date("d-M-Y");
$request_status = 'pending';

$bulk = new MongoDB\Driver\BulkWrite;

$doc = ['email1' => $_SESSION['emailid'],
	'email2' => $friend_email,
	'requestStatus' => $request_status,
	'requestDate' => $date,
	'startDate' => ''
	];

$bulk->insert($doc);

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

