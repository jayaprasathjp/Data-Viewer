$(document).ready(function () {
  $("#login-form").submit(function (e) {
    e.preventDefault();

    var email = $("#email").val();
    var pass = $("#pass").val();

    $.ajax({
      type: "POST",
      url: "login.php", // Update the path based on your directory structure
      data: {
        email: email,
        pass: pass,
      },
      success: function (response) {
        response = JSON.parse(response); // Parse the JSON response

        if (response.status == 200) {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Signin Successful",
          }).then(function () {
            window.location = "profile.php";
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Sign-in Failed",
            text: "Wrong credentials. Please try again.",
          });
        }
      },
      error: function () {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "An error occurred during login.",
        });
      },
    });
  });
});
