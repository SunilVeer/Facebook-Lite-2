<?php
try {
	
// establish a database connection to mongodb
include_once("connection.php");
session_start();
	
$filter = ['email' => $_SESSION['emailid']];
$options = ['projection' => [],'sort' => [],];
$query = new MongoDB\Driver\Query($filter, $options);
$rows1 = $mng->executeQuery('FacebookLite.member', $query);

foreach($rows1 as $row1){
	foreach($row1->friends as $friend){
		$filter = ['email' => $friend, 'parent_post_id' => 0];
		$options = [
					'projection' => [],
					'sort' => ['post_time' => -1],
					];

		$query = new MongoDB\Driver\Query($filter, $options);
		$rows = $mng->executeQuery('FacebookLite.post', $query);
			foreach ($rows as $row){
				echo "<div class='card' style='width: 40rem;  margin:0 auto; margin-top:4%'>";	     
				echo "<div class='card' style='width: 40rem;  margin:0 auto;'>
						<div class='card-body'>";
				echo "<button type='button' class='btn btn-success btn-lg btn-block'>";
				echo $friend;
				echo"</button><br>";
				echo "<button type='button' class='btn btn-layout-primary btn-lg btn-block'>";
				echo $row->post_body . "<br><br>";
				echo"</button><br>";
				echo "Posted at:".$row->post_time."<br><tr><td>
				<a href= 'like.php?post_id=$row->_id'><button type='submit' class='btn btn-primary btn-sm'>Like</button></a>
				<br><br>
				<form action='comment.php?post_id=$row->_id' method='POST'>
					<textarea class='form-control' placeholder='Write a comment...'  name='comment' type='text'></textarea>
					<div class='text-right'><button type='submit' class='btn btn-primary'>Comment</button></div>
					</div>
				</form>
				<p6>";

				$filter = ['_id' => new \Mongodb\BSON\ObjectID($row->_id)];
				$options = ['projection' => [],'sort' => [],];
				$query = new MongoDB\Driver\Query($filter, $options);
				$rows3 = $mng->executeQuery('FacebookLite.post', $query);

				foreach($rows3 as $row3){
					foreach($row3->comments as $comments){
					echo "<td><input type='text' value='$comments' readonly></td>";
					echo "<br><br>";			
					}
				}

				echo "</p6><br><br></td></tr><p1>Liked by : ";
				$filter = ['_id' => new \Mongodb\BSON\ObjectID($row->_id)];
				$options = ['projection' => [],'sort' => [],];
				$query = new MongoDB\Driver\Query($filter, $options);
				$rows2 = $mng->executeQuery('FacebookLite.post', $query);

				foreach($rows2 as $row2){
					foreach($row2->likes as $likes){
					echo $likes. " ";
					}
				}


				echo "</p1></td></tr><br>";
				if ($friend == $_SESSION['emailid']){
					echo"<div class='text-right'><a href= 'delete_post.php?post_id=$row->_id'><button type='submit' class='btn btn-success'>Delete Post</button><a></div>";
				}

				    echo "</div>	
				   </div>
				 </div>
				</div>";
			}
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
