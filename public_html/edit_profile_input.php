<?php
try {
// establish a database connection to mongodb
include 'connection.php';

session_start();

if ($_POST["fullname"]){
	$bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(['email' => $_SESSION['emailid']], ['$set' =>['full_name' => $_POST["fullname"]]]);
        $mng->executeBulkWrite('FacebookLite.member', $bulk);
}

if ($_POST["screename"]){
        $bulk = new MongoDB\Driver\BulkWrite;
	$bulk->update(['email' => $_SESSION['emailid']], ['$set' =>['screen_name' => $_POST["screename"]]]);
	$mng->executeBulkWrite('FacebookLite.member', $bulk);
}

if ($_POST["dob"]){
	$bulk = new MongoDB\Driver\BulkWrite;
	$bulk->update(['email' => $_SESSION['emailid']], ['$set' =>['date_of_birth' => $_POST["dob"]]]);
	$mng->executeBulkWrite('FacebookLite.member', $bulk);
}

if ($_POST["gender"]){
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(['email' => $_SESSION['emailid']], ['$set' =>['gender' => $_POST["gender"]]]);
        $mng->executeBulkWrite('FacebookLite.member', $bulk);	
}

if ($_POST["status"]){
        $bulk = new MongoDB\Driver\BulkWrite;
	$bulk->update(['email' => $_SESSION['emailid']], ['$set' =>['status' => $_POST["status"]]]);
	$mng->executeBulkWrite('FacebookLite.member', $bulk);
}

if ($_POST["location"]){
        $bulk = new MongoDB\Driver\BulkWrite;
	$bulk->update(['email' => $_SESSION['emailid']], ['$set' =>['location' => $_POST["location"]]]);
	$mng->executeBulkWrite('FacebookLite.member', $bulk);
}
if ($_POST["visibility"]){
	if ((strcasecmp($_POST['visibility'], 'private') == 0) || (strcasecmp($_POST['visibility'], 'friends-only') == 0) || (strcasecmp($_POST['visibility'], 'everyone') == 0)){
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(['email' => $_SESSION['emailid']], ['$set' =>['visibility' => $_POST["visibility"]]]);
	$mng->executeBulkWrite('FacebookLite.member', $bulk);	
	}
}
if ($_POST["passwd"]){
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(['email' => $_SESSION['emailid']], ['$set' =>['password' => $_POST["passwd"]]]);
        $mng->executeBulkWrite('FacebookLite.member', $bulk);	
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
