
<?php
 

include('dbcon.php');
include('session.php');


//$log_date = date('m'.'/'.'d'.'/'.'Y');
//$log_time = date("h:i:s a");

//$conn->query("INSERT INTO user_logs(log_date, log_time, user_id, user_desc, action, action_desc)
//VALUES('$log_date', '$log_time', '$session_id', '$session_access', 'Logout', 'User system logout')");
	 
     
@session_destroy();
 
    
?>


<script>

window.location='index.php';

</script>