<?php
		include('dbcon.php');
        
		session_start();
        
		$username = $_POST['username'];
		$password = $_POST['password'];
        
        $safe_pass=md5($password);
        $salt="a1Bz20ydqelm8m1wql";
        $final_pass=$salt.$safe_pass;
        
		/* student */
			$query = $conn->query("SELECT * FROM useraccounts WHERE username='$username' AND password='$final_pass'");
			$row = $query->fetch();
			$num_row = $query->rowcount();
		if( $num_row > 0 ) { 
		  
   
        $_SESSION['useraccess']=$row['access'];
        $_SESSION['id']=$row['user_id'];
 
 
        if($row['access']==='Administrator'){ ?>
        
            <script>window.location = 'home.php';</script>
           
           <?php }else{ ?>
           
           <script>window.location = 'home.php';</script>
           
    <?php } }else{ ?>

           <script>
           window.alert("User not found...")
           window.location = 'index.php';
           </script>
           
    <?php } ?>
        