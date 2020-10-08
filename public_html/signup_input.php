<?php 
try {
// establish a database connection to mongodb
include_once("connection.php");

if ((strcasecmp($_POST['visibility'], 'private') == 0) || (strcasecmp($_POST['visibility'], 'friends-only') == 0) || (strcasecmp($_POST['visibility'], 'everyone') == 0)){
	$dob = $_POST['dob'];
	$dob_formated = date ('d-M-Y', strtotime($dob));
	$bulk = new MongoDB\Driver\BulkWrite;
	$doc = ['email' => $_POST['emailid'],
			'full_name' => $_POST['fullname'],
			'screen_name' => $_POST['screename'],
			'date_of_birth' => $dob_formated,
			'gender' => $_POST['gender'],
			'status' => $_POST['status'],
			'location' => $_POST['location'],
			'visibility' => $_POST['visibility'],
			'password' => $_POST['passwd'],
			'friends' => ['0' => $_POST['emailid']]
			];
	$bulk->insert($doc);
	$mng->executeBulkWrite('FacebookLite.member', $bulk);

	session_start();
	$_SESSION['emailid'] = $_POST['emailid'];
	$_SESSION['fullname'] = $_POST['fullname'];
	$_SESSION['screename'] = $_POST['screename'];
	$_SESSION['dob'] = $_POST['dob'];
	$_SESSION['gender'] = $_POST['gender'];
	$_SESSION['status'] = $_POST['status'];
	$_SESSION['location'] = $_POST['location'];
	$_SESSION['visibility'] = $_POST['visibility'];
	$_SESSION['passwd'] = $_POST['passwd'];

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
