
<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $pass = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "SELECT * FROM detail   WHERE  email = '$email' and pass = '$pass'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $email and $pass, table row must be 1 row
		
      if($count == 1) {
        // session_register("email");
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['login_user'] = $email;
         $res = [
            'status' => 200,
            'message' => 'Login Successfull'
        ];
        echo json_encode($res);
        return;
	}
	  else if($count == 0)
	  {
      $res = [
         'status' => 300,
         'message' => 'Failed'
     ];
     echo json_encode($res);
     return;
      }
   }	


?>
