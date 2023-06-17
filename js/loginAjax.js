$(document).ready(function () {
  // LOGIN
  $("#login").on("click", function () {
    var data = {
      username: $("#username").val(),
      password: $("#password").val(),
      action: $("#action").val(),
    };

    if (data["username"] == "" || data["password"] == "") {
      Swal.fire({
        icon: "warning",
        text: "Please enter your username and password!",
      });
    } else {
      $.ajax({
        url: "login.php",
        method: "POST",
        data: data,
        success: function (response) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener("mouseenter", Swal.stopTimer);
              toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
          });
          if (response == "admin") {
            $("#form_login").trigger("reset");
            Toast.fire({
              icon: "success",
              title: "Logged in successfully",
            });
            setTimeout(function () {
              window.location = "admin/dashboard.php";
            }, 1500);
          } else if (response == "employee") {
            Toast.fire({
              icon: "success",
              title: "Logged in successfully",
            });
            setTimeout(function () {
              window.location = "employee/index.php";
            }, 1500);
          } else if (response == "Username not found!") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          } else if (response == "Account disabled") {
            Swal.fire({
              icon: "error",
              title: response,
              text: "Please contact your Admin",
            });
            swal.fire(response, "Please contact your Admin", "error");
          } else if (response == "Incorrect password!") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          }
        },
      });
    }
  });
  // TIME IN
  $("#timeIn").on("click", function () {
    var data = {
      username: $("#timeIn_username").val(),
      password: $("#timeIn_password").val(),
      action: $("#timeIn_action").val(),
    };

    if (data["username"] == "" || data["password"] == "") {
      Swal.fire({
        icon: "warning",
        text: "Please enter your username and password!",
      });
    } else {
      $.ajax({
        url: "login.php",
        method: "POST",
        data: data,
        success: function (response) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener("mouseenter", Swal.stopTimer);
              toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
          });
          if (response == "Success") {
            $("#form_timein").trigger("reset");
            Swal.fire({
              position: "center",
              icon: "success",
              title: "You have successfully timed in",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              location.reload();
            }, 3000);
          } else if (response == "You've already timed in for today!") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: response,
            });
          } else if (response == "Username not found!") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          } else if (response == "Account disabled") {
            Swal.fire({
              icon: "error",
              title: response,
              text: "Please contact your Admin",
            });
            swal.fire(response, "Please contact your Admin", "error");
          } else if (response == "Incorrect password!") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          }
        },
      });
    }
  });

  // TIME OUT
  $("#timeOut").on("click", function () {
    var data = {
      username: $("#timeOut_username").val(),
      password: $("#timeOut_password").val(),
      action: $("#timeOut_action").val(),
    };

    if (data["username"] == "" || data["password"] == "") {
      Swal.fire({
        icon: "warning",
        text: "Please enter your username and password!",
      });
    } else {
      $.ajax({
        url: "login.php",
        method: "POST",
        data: data,
        success: function (response) {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener("mouseenter", Swal.stopTimer);
              toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
          });
          if (response == "Success") {
            $("#form_timeout").trigger("reset");
            Swal.fire({
              position: "center",
              icon: "success",
              title: "You have successfully timed out",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              location.reload();
            }, 3000);
          } else if (response == "You've already timed out for today!") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: response,
            });
          } else if (response == "You haven't timed in yet!") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: response,
            });
          } else if (response == "Username not found!") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          } else if (response == "Account disabled") {
            Swal.fire({
              icon: "error",
              title: response,
              text: "Please contact your Admin",
            });
            swal.fire(response, "Please contact your Admin", "error");
          } else if (response == "Incorrect password!") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          }
        },
      });
    }
  });
});
