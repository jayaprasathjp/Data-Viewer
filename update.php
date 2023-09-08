<?php

require 'config.php';
include("session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $file_name = $_FILES['photo']['name'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_name = $name . "." . $ext;
    $filePath = "img/profile/" . $file_name;

    // Check if the file was uploaded successfully
    if (move_uploaded_file($file_tmp, $filePath)) {
        // File moved successfully
        $query = "UPDATE detail SET photo='$filePath',name='$name', age='$age', dob='$dob', phone='$phone',address='$address',gender='$gender' WHERE email='$s'";
        $query_run = mysqli_query($db, $query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'Profile Updated Successfully'
            ];
            echo json_encode($res);
            return;
        }
    } else {
        // File move failed
        $res = [
            'status' => 500,
            'message' => 'Failed to move uploaded file'
        ];
        echo json_encode($res);
        return;
    }
} else {
    $res = [
        'status' => 500,
        'message' => 'Failed to Update Profile'
    ];
    echo json_encode($res);
}

?>
