<?php 
include("config.php");
if(isset($_POST['save_reg']))
{
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$dob = mysqli_real_escape_string($db, $_POST['dob']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
    $pass = mysqli_real_escape_string($db, $_POST['pass']);
	
    if($name == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    try{
    $query = "INSERT INTO detail (name,email,dob,phone,pass) VALUES('$name','$email','$dob','$phone','$pass')";
    $query_run = mysqli_query($db, $query);
       if($query_run)
    {
       
        $res = [
            'status' => 200,
            'message' => 'Account Created'
        ];
        
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Details Not Updated'
        ];
        echo json_encode($res);
        return;
    }}
    catch(Exception $e){
        $res = [
            'status' => 500,
            'message' => 'Details Not Updated'
        ];
        echo json_encode($res);
        return;
    }
	
}
