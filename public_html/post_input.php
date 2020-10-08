<?php
try {

// establish a database connection to mongodb
include 'connection.php';

session_start();

$date = Date("d-M-Y g:i:s A");

$bulk = new MongoDB\Driver\BulkWrite;
$doc = ['email' => $_SESSION['emailid'],
		'post_body' => $_POST['input'],
		'post_time' => $date,
		'parent_post_id' => 0
		];
$bulk->insert($doc);
$result = $mng->executeBulkWrite('FacebookLite.post', $bulk);

if ($result){
	header ('Location: home.php');
}
else{
	header ('Location: signup.php');
}
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
