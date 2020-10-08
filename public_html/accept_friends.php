<?php

// establish a database connection to mongodb
include 'connection.php';
session_start();

$friend_email = $_GET['email'];
$request_status = 'accepted';
$date = Date("d M Y");


$bulk = new MongoDB\Driver\BulkWrite;
$bulk->update(['email2' => $_SESSION['emailid'], 'email1' => $friend_email], ['$set' => ['requestStatus' => 'accepted', 'startDate' => $date]]);
$mng->executeBulkWrite('FacebookLite.friend', $bulk);


$bulk = new MongoDB\Driver\BulkWrite;
$bulk->update(['email' => $_SESSION['emailid']],['$push'=> ['friends' => ['$each'=> [$friend_email]]]]);
$mng->executeBulkWrite('FacebookLite.member', $bulk);

$bulk = new MongoDB\Driver\BulkWrite;
$bulk->update(['email' => $friend_email],['$push'=> ['friends' => ['$each'=> [$_SESSION['emailid']]]]]);
$mng->executeBulkWrite('FacebookLite.member', $bulk);

header('Location: home.php');

?>

