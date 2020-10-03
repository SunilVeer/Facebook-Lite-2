<?php
try 
{
	// establish a database connection to mongodb
    include_once("connection.php");
    session_start();

    $filter = ['email' => $_POST["emailid"],
	    	'password' => $_POST["passwd"]
    		];
    $options = [
                'projection' => ['_id' => 0],
                'sort' => [],
               ];

     $query = new MongoDB\Driver\Query($filter, $options);
     $rows = $mng->executeQuery('FacebookLite.member', $query);
     $valid_user = false;

     foreach ($rows as $row){
	     if ($row->email){
		     $valid_user = true;
	     }
     }

if($valid_user){
	$_SESSION['emailid'] = $_POST['emailid'];
	$_SESSION['fullname'] = $_POST['fullname'];
	$_SESSION['screename'] = $_POST['screename'];
	$_SESSION['dob'] = $_POST['dob'];
	$_SESSION['gender'] = $_POST['status'];
	$_SESSION['location'] = $_POST['location'];
	$_SESSION['visibility'] = $_POST['visibility'];
	$_SESSION['passwd'] = $_POST['passwd'];
	header('Location:home.php');
}

else {
	header('Location:index.php');
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
