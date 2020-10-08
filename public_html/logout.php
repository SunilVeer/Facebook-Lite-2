<?php   

//we have already started the session after log in so we will be only destroying the session
session_destroy();
session_destroy();
session_destroy();
session_destroy();
session_destroy();
session_destroy();
session_destroy(); 

//redirect it back to log in page
header('Location: index.php'); 
exit();
?>
