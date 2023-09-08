<?php 
require 'config.php';
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile DV</title>
    <link rel="icon" type="image/png" href="img/icon/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="css/button.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
     
.popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    align-items: center;
    justify-content: center;
    z-index: 1000; /* Set a higher z-index to make sure the popup appears on top */
    overflow: auto;
}
#closePopup {
    margin-top: 10px;
}
    </style>
</head>
<body>
    <button  onclick="logout()" href="logout.php" class="btnlog transparent logout">
              logout
            </button>

    <?php
              $query2 = "SELECT * FROM detail WHERE email='$s'";
              $query_run2 = mysqli_query($db, $query2);
              $row = mysqli_fetch_assoc($query_run2);
              if($row['photo']=="")
		{
			$k="img\profile\default.png";
		}
		else{
		$k=$row['photo'];
		}
              ?>
          

      

          <h1 class="data">PROFILE</h1>
    <div class="wrapper">
    <img src="img/pro1.png" alt="" class="pro1"></img>
    <img src="img/pro2.png" alt="" class="pro2"></img>
        <div class="user-card">
            <div class="user-card-img">
            <img src="<?php echo $k?>" alt="">
            </div>
            <div class="user-card-info">
              
              <h2><?= $row['name'] ?></h2>
              <p><span>Email:</span> <?= $row['email'] ?></p>
              <p><span>Date of Birth:</span><?= $row['dob'] ?></p>
              <p><span>phone:</span><?= $row['phone'] ?></p>
              <p><span>age:</span><?= $row['age'] ?></p>
              <p><span>Address:</span><?= $row['address'] ?></p>
              <p><span>Gender:</span><?= $row['gender'] ?></p>
              
            </div>
        </div>
    </div>
    <button id="openPopup" class="btn editbtn">
              EDIT
            </button>
            <div class="popup modal" id="popup">   
            <div class="wrapper1">
    <div class="title">
      Edit Details
    </div>
   
    <div class="form">
    <form id="editForm" name="editForm"> 
       <div class="inputfield">
          <label>Name</label>
          <input name="name" type="text" class="input" value="<?= $row['name'] ?>" required>
       </div>  
       <div class="inputfield">
          <label>Email</label>
          <input name="name" type="text" class="input" value="<?= $row['email'] ?>" disabled>
       </div>  
        <div class="inputfield">
        <label>Profile Photo</label>
          <input name="photo" type="file" id="validationCustomUsername" onchange="return fileValidation()" class="input custom-file-input" required>
        </div>  
       <div class="inputfield">
          <label>Date of Birth</label>
          <input name="dob" type="date" class="input" value="<?= $row['dob'] ?>" required>
       </div>
      <div class="inputfield">
          <label>Age</label>
          <input name="age" type="number" class="input" value="<?= $row['age'] ?>" required>
       </div>
       <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
            <select class="input"  name="gender" id="gender" required>
              <option value="">Select</option>
              <option value="male" <?= ($row['gender'] == 'male') ? 'selected' : '' ?>>Male</option>
              <option value="female" <?= ($row['gender'] == 'female') ? 'selected' : '' ?>>Female</option>
            </select>
          </div>
       </div> 
      <div class="inputfield">
          <label>Phone No</label>
          <input name="phone" pattern="[0-9]{10}" maxlength="10"  title="Please enter a valid 10-digit phone number" type="text" class="input" value="<?= $row['phone'] ?>" required>
       </div>  
       <div class="inputfield">
          <label>Address</label>
          <textarea name="address" type="textarea" class="textarea" required><?= $row['address'] ?></textarea>
       </div>
      <div class="inputfield">
        <input id="closePopup" type="button" value="close" class="btn3 btn-info">
        <input type="submit" name="signupButton" id="signupButton" value="Apply" class="btn3 btn-info2"> 
      </div>
    </form>
</div>


</div>
</div>
<div class="footer1">Designed and Developed by JAYAPRASATH</div>
<script>
    function logout() {
    window.location.href = "logout.php";
    history.replaceState({}, document.title, "logout.php");
}
$(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    function fileValidation() {
        var fileInput = document.getElementById('validationCustomUsername');
        var fileSize = (fileInput.files[0].size) / 1024;
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if (!allowedExtensions.exec(filePath)) {
            var msg = "Only Image Files are allowed!";
            fileInput.value = '';
            alert("Only Image Files are allowed!");
        } else {
            if (fileSize > 2000) {
                var msg = "File size should be less than 2MB!";
                fileInput.value = '';
                alert("size is tooo largeee!!!");
            }
        }
    }
    $(document).ready(function() {
        $("#openPopup").click(function() {
            $("#popup").fadeIn();
        });
    
        $("#closePopup, .popup").click(function(e) {
            if (e.target !== this) return; 
            $("#popup").fadeOut();
        });
    });
    
    function fileValidation() {
        var fileInput = document.getElementById('validationCustomUsername');
        var fileSize = (fileInput.files[0].size) / 1024;
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if (!allowedExtensions.exec(filePath)) {
            var msg = "Only Image Files are allowed!";
            fileInput.value = '';
            alert("Only Image Files are allowed!");
        } else {
            if (fileSize > 2000) {
                var msg = "File size should be less than 2MB!";
                fileInput.value = '';
                alert("size is tooo largeee!!!");
            }
        }
    }
    $("#editForm").submit(function(e) {
    e.preventDefault(); // Prevent the default form submission

    var formData = new FormData(this);

    $.ajax({
      type: "POST",
      url: "update.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {
        var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);
                } else if (res.status == 200) {
                    console.log("Response Status:", res.status);

                    $('#editForm')[0].reset();
                    document.getElementById('popup').style.display = 'none';
                        location.reload();

                }
                else if (res.status == 500) {
                    alert(response.message);
                }
      },
      error: function(xhr, status, error) {
        console.log("AJAX Error:", error);
      }
    });
  });
    </script>

</body>
</html>
