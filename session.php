<?php

include('dbcon.php');
//Start session

session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) { ?>


<script>
window.location = 'index.php';
</script>

<?php
    exit();
}

$session_id=$_SESSION['id'];

$session_access=$_SESSION['useraccess'];


 
$user_query = $conn->query("SELECT * FROM useraccounts WHERE user_id = '$session_id'");
$user_row = $user_query->fetch();

 
$name = substr($user_row['fname'], 0,1).". ".$user_row['lname'];
//$user_img = $user_row['user_img'];
$name2 = $user_row['fname']." ".$user_row['lname'];
 

$check_username = $user_row['username'];
$check_pass = $user_row['password'];


?>