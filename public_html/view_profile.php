<!doctype html>
<?php
try {
// establish a database connection to mongodb
include 'connection.php';
session_start();

$filter = ['email' => $_SESSION["emailid"]];
$options = ['projection' => ['_id' => 0],
			'sort' => [],
			];
$query = new MongoDB\Driver\Query($filter, $options);
$rows = $mng->executeQuery('FacebookLite.member', $query);

foreach ($rows as $row){
	$email = $row->email;
	$fname = $row->full_name;
	$sname = $row->screen_name;
	$dob = $row->date_of_birth;
	$gender = $row->gender;
	$status = $row->status;
	$location = $row->location;
	$visibility = $row->visibility;
	
echo "
<html lang='en'>
  <head>
    <title>View Profile Page</title>
    <meta charset='utf-8'>
  </head>
  <body style='background-image:url('bubbles.jpg'); background-size: 1400px 660px'>
	<h1 style='color:lightgrey; font-size: 2em; margin-top: 1em; margin-left: 1em'>
      <center>View Profile Page</center>
    </h1>
    <style>
      div {
      background-color: lightgrey;
      width: 500px;
      border: 8px solid red;
      padding: 10px;
      margin: 20px;
      text-align: left;
      left: 50%;
      top: 50%;
      transform: translate(75%, 10%);
      }
    </style>
    <div class='container'>
      <label>
      <b style='color:Black; font-size: 2em;'>Your profile details:</b>
      </label>
      <br></br>
      <form action='home.php' method='post'>
        <table>
          <tr>
            <td>
              <label for='emailid'>
              <b>Email : </b>
              </label>
            </td>
            <td>
              <input type='email' name='emailid' value='$email' readonly>
            </td>
          </tr>
          <tr>
            <td><label for='fullname'>
              <b>Full Name : </b>
              </label>
            </td>
            <td><input type='text'  name='fullname' value='$fname' readonly></td>
          </tr>
          <tr>
            <td><label for='screename'>
              <b>Screen Name : </b>
              </label>
            </td>
            <td>   <input type='text' name='screename' value='$sname' readonly></td>
          </tr>
          <tr>
            <td><label for='dob'>
              <b>Date Of Birth : </b>
              </label>
            </td>
            <td><input type='text'  name='dob' value='$dob' readonly></td>
          </tr>
          <tr>
            <td><label for='gender'>
              <b>Select a Gender : </b>
              </label>
            </td>
            <td>    
              <input type='text' name='gender' value='$gender'readonly>
            </td>
          </tr>
          <tr>
            <td><label for='status'>
              <b>Status : </b>
              </label>
            </td>
            <td><input type='text' name='status' value='$status'readonly></td>
          </tr>
          <tr>
            <td><label for='visibility'>
              <b>Visibility Level : </b>
              </label>
            </td>
            <td>   <input type='text' name='visibility'  value='$visibility'readonly></td>
          </tr>
          <tr>
            <td><label for='location'>
              <b>Location : </b>
              </label>
            </td>
            <td><input type='text' name='location'  value='$location'readonly></td>
          </tr>
          <tr>
            <td><button type='submit'>Go Back</button></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>";
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
