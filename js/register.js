$(document).on("submit", "#reg", function (e) {
  e.preventDefault();
  var formData = new FormData(this);
  formData.append("save_reg", true);
  $.ajax({
    type: "POST",
    url: "register.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      if (res.status == 422) {
        $("#errorMessage").removeClass("d-none");
        $("#errorMessage").text(res.message);
      } else if (res.status == 200) {
        swal.fire({
          icon: "success",
          title: "Success",
          text: "Registered Successful",
        }).then(function () {
            $("#reg").load(location.href + " #reg");
            const container = document.querySelector(".container");
            container.classList.remove("sign-up-mode");
            
          });
        
      } else if (res.status == 500) {
        swal.fire({
          icon: "error",
          title: "Failed",
          text: "Email already exist",
        });
      }
    },
  });
});
