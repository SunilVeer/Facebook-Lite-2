<?php

try {
// establish a database connection to mongodb
include 'connection.php';

$filter = ['email' =>['$ne'=> $_SESSION["emailid"]]];
$options = ['projection' => ['_id' => 0],
			'sort' => [],
           ];
$query = new MongoDB\Driver\Query($filter, $options);
$rows = $mng->executeQuery('FacebookLite.member', $query);

$email='NULL';

foreach ($rows as $row){
	$found = 0;
	$email = $row->email;
	$filter1 = ['email1' => $row->email, 'email2' => $_SESSION["emailid"]];
	$options1 = ['projection' => ['_id' => 0, 'requestStatus'=>1],
		         'sort' => [],
				];
	$query1 = new MongoDB\Driver\Query($filter1, $options1);
	$rows1 = $mng->executeQuery('FacebookLite.friend', $query1);
	foreach ($rows1 as $rows2){
	
		if ($rows2->requestStatus == 'pending'){
			$found = 1;
		echo "<tr><td>";
		echo $email . "</td>
		<td><a href= 'reject_friends.php?email=$email'><button type='submit' class='btn btn-primary btn-sm'>Reject</button></a> <a href= 'accept_friends.php?email=$email'><button type='submit' class='btn btn-primary btn-sm'>Accept</button></a></td>
		</tr>";
		}
		else if ($rows2->requestStatus == 'accepted'){
			$found = 1;
		    echo "<tr><td>" .$email . "</td><td><a href= 'delete_friends.php?email=$email'><button type='submit' class='btn btn-primary btn-sm'> Delete Friend</button></a></td></tr>";
		}
	}
	
	$filter1 = ['email2' => $row->email, 'email1' => $_SESSION["emailid"]];
	$options1 = ['projection' => ['_id' => 0, 'requestStatus'=>1],
			     'sort' => [],
				];
	$query1 = new MongoDB\Driver\Query($filter1, $options1);
	$rows3 = $mng->executeQuery('FacebookLite.friend', $query1);
		
		foreach ($rows3 as $rows4){				        
			if ($rows4->requestStatus == 'pending'){
				$found = 1;
                echo "<tr><td>";
                echo $email . "</td><td><button type='submit' class='btn btn-primary btn-sm'>Request Sent</button></td></tr>";
			}	
			else if ($rows4->requestStatus == 'accepted'){
				$found = 1;
				echo "<tr><td>" .$email . "</td><td><a href= 'delete_friends.php?email=$email'><button type='submit' class='btn btn-primary btn-sm'> Delete Friend</button></a></td></tr>";
			}
		}
		
		if(!$found){
			echo "<tr><td>";	                     
			echo $email . "</td><td><a href= 'manage_friends.php?email=$email'><button type='submit' class='btn btn-primary btn-sm'>Send Request</button></a></td></tr>";
		}
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
