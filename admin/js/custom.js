$(document).ready(function () {
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // EMPLOYEE
  //fetching employee data by id
  $(document).on("click", ".editEmployeeData", function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "data_process.php",
      method: "GET",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        $("#employeeID").val(data.employeeID);
        $("#userID").val(data.userInfoID);
        $("#update_firstname").val(data.firstname);
        $("#update_middlename").val(data.middlename);
        $("#update_lastname").val(data.lastname);
        $("#update_address").val(data.userAddress);
        $("#update_birthday").val(data.bday);
        $("#update_gender").val(data.gender);
        $("#update_email").val(data.emailAddress);
        $("#update_contact").val(data.contactNumber);
        $("#update_position").val(data.positionID);
        $("#update_salary").val(data.basicSalary);
        $("#userPhoto").html(data.userPhoto);
        $("#edit_employee").modal("show");
      },
    });
  });

  // delete employee
  $(document).on("click", ".deleteEmployee", function () {
    var id = $(this).attr("id");

    Swal.fire({
      title: "Are you sure?",
      text: "employee will be removed",
      icon: "warning",
      showCancelButton: true,
      cancelButtonColor: "#d33",
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "data_process.php",
          method: "POST",
          data: { id: id },
          success: function (response) {
            if (response == "success") {
              Swal.fire("Deleted!", "Employee has been deleted.", "success");
              location.reload();
            }
          },
        });
      }
    });
  });

  // adding employee on database
  $("#addNewEmployee").on("submit", function (e) {
    e.preventDefault();
    var firstname = $("#firstname").val();
    var middlename = $("#middlename").val();
    var lastname = $("#lastname").val();
    var address = $("#address").val();
    var birthday = $("#birthday").val();
    var contact = $("#contact").val();
    var email = $("#email").val();
    var gender = $("#gender").val();
    var position = $("#position").val();
    var salary = $("#salary").val();
    var photo = $("#photo")[0].files;

    var formData = new FormData($("#addNewEmployee")[0]);
    formData.append("submit", "addNewEmployee");

    var data = [
      firstname,
      middlename,
      lastname,
      address,
      birthday,
      contact,
      email,
      gender,
      position,
      salary,
    ];
    var dataIDs = [
      "firstname",
      "middlename",
      "lastname",
      "address",
      "birthday",
      "contact",
      "email",
      "gender",
      "position",
      "salary",
    ];
    var validate_error = false;
    $(
      "#firstname, #middlename, #lastname, #address, #birthday, #contact, #email, #gender, #position, #salary, #photo"
    ).removeClass("is-invalid");
    if (
      firstname == "" ||
      middlename == "" ||
      lastname == "" ||
      address == "" ||
      birthday == "" ||
      contact == "" ||
      email == "" ||
      gender == "" ||
      position == "" ||
      salary == ""
    ) {
      for (let i = 0; i < data.length; i++) {
        if (data[i] == "") {
          $("#" + dataIDs[i]).addClass("is-invalid");
          $("#" + dataIDs[i] + "_error")
            .addClass("invalid-feedback")
            .text(dataIDs[i] + " must not be empty.");
          validate_error = true;
        } else {
          $("#" + dataIDs[i]).addClass("is-valid");
        }
      }
    }

    if (onlyLetters(firstname) == false && data["firstname"] != "") {
      $("#firstname").addClass("is-invalid");
      $("#firstname_error")
        .addClass("invalid-feedback")
        .text("firstname must be all letters.");
      validate_error = true;
    }
    if (onlyLetters(middlename) == false && data["middlename"] != "") {
      $("#middlename").addClass("is-invalid");
      $("#middlename_error")
        .addClass("invalid-feedback")
        .text("middlename must be all letters.");
      validate_error = true;
    }
    if (onlyLetters(lastname) == false && data["lastname"] != "") {
      $("#lastname").addClass("is-invalid");
      $("#lastname_error")
        .addClass("invalid-feedback")
        .text("lastname must be all letters.");
      validate_error = true;
    }
    if (onlyNumbers(contact) == false && data["contact"] != "") {
      $("#contact").addClass("is-invalid");
      $("#contact_error")
        .addClass("invalid-feedback")
        .text("contact must not contain letters.");
      validate_error = true;
    }
    if (validateFloat(salary) == false && data["salary"] != "") {
      $("#salary").addClass("is-invalid");
      $("#salary_error").addClass("invalid-feedback").text("invalid input.");
      validate_error = true;
    }
    if (ValidateEmail(email) == false && data["email"] != "") {
      $("#email").addClass("is-invalid");
      $("#email_error")
        .addClass("invalid-feedback")
        .text("invalid email address.");
      validate_error = true;
    }
    if (photo.length == "") {
      $("#photo").addClass("is-invalid");
      $("#photo_error")
        .addClass("invalid-feedback")
        .text("Choose image file to upload.");
      validate_error = true;
    }
    if (validate_error == false) {
      $.ajax({
        url: "data_process.php",
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
          if (response == "success") {
            $("#addNewEmployee").trigger("reset");
            $("#add_employee").modal("hide");
            swal.fire("Added Successfully", "", "success");
            setInterval(function () {
              location.reload();
            }, 1500);
          } else if (response == "Image upload failed") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          } else if (response == "Adding employee failed!") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          } else if (response == "You can't upload files of this type") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          } else if (response == "Adding employee failed!") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          } else if (response == "Sorry, your file is too large.") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          } else if (response == "unknown error occurred!") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          } else if (response == "There is a problem on database!") {
            Swal.fire({
              icon: "error",
              text: response,
            });
          }
        },
      });
    }
  });
  // updating employee data on database.
  $("#updateEmployeeForm").on("submit", function (e) {
    e.preventDefault();
    var userID = $("#userID").val();
    var firstname = $("#update_firstname").val();
    var middlename = $("#update_middlename").val();
    var lastname = $("#update_lastname").val();
    var address = $("#update_address").val();
    var birthday = $("#update_birthday").val();
    var contact = $("#update_contact").val();
    var email = $("#update_email").val();
    var gender = $("#update_gender").val();
    var position = $("#update_position").val();
    var salary = $("#update_salary").val();

    var formData = new FormData($("#updateEmployeeForm")[0]);
    formData.append("submit", "updateEmployeeData");

    var data = [
      firstname,
      middlename,
      lastname,
      address,
      birthday,
      contact,
      email,
      gender,
      position,
      salary,
    ];
    var dataIDs = [
      "firstname",
      "middlename",
      "lastname",
      "address",
      "birthday",
      "contact",
      "email",
      "gender",
      "position",
      "salary",
    ];
    var validate_error = false;
    $(
      "#firstname, #middlename, #lastname, #address, #birthday, #contact, #email, #gender, #position, #salary, #photo"
    ).removeClass("is-invalid");
    if (
      firstname == "" ||
      middlename == "" ||
      lastname == "" ||
      address == "" ||
      birthday == "" ||
      contact == "" ||
      email == "" ||
      gender == "" ||
      position == "" ||
      salary == ""
    ) {
      for (let i = 0; i < data.length; i++) {
        if (data[i] == "") {
          $("#update_" + dataIDs[i]).addClass("is-invalid");
          $("#" + dataIDs[i] + "_error_update")
            .addClass("invalid-feedback")
            .text(dataIDs[i] + " must not be empty.");
          validate_error = true;
        } else {
          $("#" + dataIDs[i]).addClass("is-valid");
        }
      }
    }

    if (onlyLetters(firstname) == false && data["firstname"] != "") {
      $("#update_firstname").addClass("is-invalid");
      $("#firstname_error_update")
        .addClass("invalid-feedback")
        .text("firstname must be all letters.");
      validate_error = true;
    }
    if (onlyLetters(middlename) == false && data["middlename"] != "") {
      $("#update_middlename").addClass("is-invalid");
      $("#middlename_error_update")
        .addClass("invalid-feedback")
        .text("middlename must be all letters.");
      validate_error = true;
    }
    if (onlyLetters(lastname) == false && data["lastname"] != "") {
      $("#update_lastname").addClass("is-invalid");
      $("#lastname_error_update")
        .addClass("invalid-feedback")
        .text("lastname must be all letters.");
      validate_error = true;
    }
    if (onlyNumbers(contact) == false && data["contact"] != "") {
      $("#update_contact").addClass("is-invalid");
      $("#contact_error_update")
        .addClass("invalid-feedback")
        .text("contact must not contain letters.");
      validate_error = true;
    }
    if (validateFloat(salary) == false && data["salary"] != "") {
      $("#update_salary").addClass("is-invalid");
      $("#salary_error_update")
        .addClass("invalid-feedback")
        .text("invalid input.");
      validate_error = true;
    }
    if (ValidateEmail(email) == false && data["email"] != "") {
      $("#update_email").addClass("is-invalid");
      $("#email_error_update")
        .addClass("invalid-feedback")
        .text("invalid email address.");
      validate_error = true;
    }
    if (validate_error == false) {
      $.ajax({
        url: "data_process.php",
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
          if (response == "success") {
            Swal.fire({
              icon: "success",
              text: "Updated Successfully",
            });
            $("#edit_employee").modal("hide");
            setInterval(function () {
              location.reload();
            }, 1500);
          } else if (response == "failed") {
            Swal.fire({
              icon: "error",
              title: "Ooops!",
              text: "There's a problem on your database",
            });
          }
        },
      });
    }
  });

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // ATTENDANCE

  // fetching employeeID preparing for adding attendance record
  $(document).on("click", ".fetchByEmployeeID", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $("#display_employeeID").val(id);
    $("#addAttendance_employeeID").val(id);
    $("#addattendance").modal("show");
  });

  // adding attendance record
  $("#addAttendanceForm").on("submit", function (e) {
    e.preventDefault();
    var employeeID = $("#addAttendance_employeeID").val();
    var attendanceDate = $("#attendanceDate").val();
    var timeIn = $("#addAttendance_in").val();
    var timeOut = $("#addAttendance_Out").val();

    var formData = new FormData($("#addAttendanceForm")[0]);
    formData.append("submit", "addAttendance");
    $.ajax({
      url: "attendance_process.php",
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response == "success") {
          Swal.fire({
            icon: "success",
            text: "Recorded Successfully",
          });
          $("#addattendance").modal("hide");
          setInterval(function () {
            location.reload();
          }, 1500);
        } else if (response == "failed") {
          Swal.fire({
            icon: "error",
            title: "Ooops!",
            text: "Selected date is already on the record",
          });
        }
      },
    });
  });

  // FETCHING ATTENDANCE RECORDS OF EMPLOYEE
  $(document).on("click", ".fetchAttendanceData", function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "attendance_process.php",
      method: "GET",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        $("#attendanceID").val(data.attendanceID);
        $("#update_date").val(data.attendanceDate);
        $("#update_timeIn").val(data.timeIn);
        $("#update_timeOut").val(data.timedOut);
        $("#editattendance").modal("show");
      },
    });
  });

  // updating employee attendance record
  $("#updateAttendanceForm").on("submit", function (e) {
    e.preventDefault();
    var id = $("#attendanceID").val();
    var attendanceDate = $("#update_date").val();
    var timeIn = $("#update_timeIn").val();
    var timeOut = $("#update_timeOut").val();

    var formData = new FormData($("#updateAttendanceForm")[0]);
    formData.append("submit", "updateAttendanceRecord");
    $.ajax({
      url: "attendance_process.php",
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response == "success") {
          Swal.fire({
            icon: "success",
            text: "Updated Successfully",
          });
          $("#editattendance").modal("hide");
          setInterval(function () {
            location.reload();
          }, 1500);
        } else if (response == "failed") {
          Swal.fire({
            icon: "error",
            title: "Ooops!",
            text: "There's a problem on your database",
          });
        }
      },
    });
  });

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // POSITION

  // ADDING POSITION
  $("#addPositionForm").on("submit", function (e) {
    e.preventDefault();
    var positionName = $("#positionName").val();

    var formData = new FormData($("#addPositionForm")[0]);
    formData.append("submit", "addPosition");
    $.ajax({
      url: "position_process.php",
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response == "success") {
          Swal.fire({
            icon: "success",
            text: "Added Successfully",
          });
          $("#addPositionModal").modal("hide");
          setInterval(function () {
            location.reload();
          }, 1500);
        } else if (response == "failed") {
          Swal.fire({
            icon: "error",
            title: "Ooops!",
            text: "Selected date is already on the record",
          });
        }
      },
    });
  });

  //FETCHING POSITION DATAS
  $(document).on("click", ".editPositionData", function () {
    var id = $(this).attr("id");
    $.ajax({
      url: "position_process.php",
      method: "GET",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        $("#editposition").val(data.positionName);
        $("#editpositionID").val(data.positionID);

        $("#editPositionModal").modal("show");
      },
    });
  });
  // UPDATING POSITION DATA
  $("#updatePositionForm").on("submit", function (e) {
    e.preventDefault();
    var id = $("#editpositionID").val();
    var positionName = $("#editposition").val();

    var formData = new FormData($("#updatePositionForm")[0]);
    formData.append("submit", "updatePosition");
    $.ajax({
      url: "position_process.php",
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response == "success") {
          Swal.fire({
            icon: "success",
            text: "Updated Successfully",
          });
          $("#editPositionModal").modal("hide");
          setInterval(function () {
            location.reload();
          }, 1500);
        } else if (response == "failed") {
          Swal.fire({
            icon: "error",
            title: "Ooops!",
            text: "There's a problem on your database",
          });
        }
      },
    });
  });
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // PROJECT

  // ADDING PROJECT DETAILS IN DATABASE
  $("#addProjectForm").on("submit", function (e) {
    e.preventDefault();
    var projectName = $("#projectName").val();
    var projectLocation = $("#projectLocation").val();

    var formData = new FormData($("#addProjectForm")[0]);
    formData.append("submit", "addProject");
    $.ajax({
      url: "project_process.php",
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response == "success") {
          Swal.fire({
            icon: "success",
            text: "Added Successfully",
          });
          $("#addPositionModal").modal("hide");
          setInterval(function () {
            location.reload();
          }, 1500);
        } else if (response == "failed") {
          Swal.fire({
            icon: "error",
            title: "Ooops!",
            text: "Selected date is already on the record",
          });
        }
      },
    });
  });

  // FETCH PROJECT ID
  $(document).on("click", ".assignEmployeeButton", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $("#assign_projectID").val(id);
    $("#assignEmployeeModal").modal("show");
  });

  // ASSIGN EMPLOYEE ON PROJECT
  $("#assignEmployeeForm").on("submit", function (e) {
    e.preventDefault();
    var employeeID = $("#assign_employeeID").val();
    var projectID = $("#assign_projectID").val();

    var formData = new FormData($("#assignEmployeeForm")[0]);
    formData.append("submit", "assignEmployee");
    $.ajax({
      url: "project_process.php",
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response == "success") {
          Swal.fire({
            icon: "success",
            text: "Assigned successfully",
          });
          $("#addPositionModal").modal("hide");
          setInterval(function () {
            location.reload();
          }, 1500);
        } else if (response == "Employee ID not found!") {
          Swal.fire({
            icon: "error",
            title: "Ooops!",
            text: response,
          });
        } else if (response == "Employee already on list!") {
          Swal.fire({
            icon: "error",
            title: "Ooops!",
            text: response,
          });
        } else if (
          response == "Employee ID already have an assigned project!"
        ) {
          Swal.fire({
            icon: "error",
            title: "Ooops!",
            text: response,
          });
        } else if (response == "Something went Wrong!") {
          Swal.fire({
            icon: "error",
            title: "Ooops!",
            text: response,
          });
        }
      },
    });
  });

  // REMOVE EMPLOYEE IN PROJECT
  $(document).on("click", ".removeEmployee", function () {
    var id = $(this).attr("id");
    console.log(id);
    Swal.fire({
      title: "Are you sure?",
      text: "employee will be removed from the project.",
      icon: "warning",
      showCancelButton: true,
      cancelButtonColor: "#d33",
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Confirm",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "project_process.php",
          method: "POST",
          data: { id: id },
          success: function (response) {
            if (response == "success") {
              Swal.fire("Deleted!", "Employee has been deleted.", "success");
              location.reload();
            }
          },
        });
      }
    });
  });

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // DEDUCTIONS

  // FETCHING ID PREPARING FOR ADDING DATA TO DEDUCTION
  $(document).on("click", ".addDeductionButton", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $("#deduction_userInfoID").val(id);
    $("#addDeductionModal").modal("show");
  });

  //SUBMIT TO ADD DEDUCTION DATA
  $("#addDeductionForm").on("submit", function (e) {
    e.preventDefault();
    var id = $("#deduction_userInfoID").val();
    var description = $("#deduction_description").val();
    var amount = $("#deduction_amount").val();

    var formData = new FormData($("#addDeductionForm")[0]);
    formData.append("submit", "addDeduction");

    validate_error = false;

    if (validateFloat(amount) == false) {
      $("#deduction_amount").addClass("is-invalid");
      $("#deduction_amount_error")
        .addClass("invalid-feedback")
        .text("invalid input.");
      validate_error = true;
    }

    $.ajax({
      url: "deduction_process.php",
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response == "success") {
          $("#addDeductionModal").modal("hide");
          setInterval(function () {
            location.reload();
          }, 1000);
        } else if (response == "failed!") {
          Swal.fire({
            icon: "error",
            title: "Ooops!",
            text: "There's a problem with database",
          });
        }
      },
    });
  });

  // FETCHING ID PREPARING FOR UPDATING DEDUCTION DATA
  $(document).on("click", ".editDeductionButton", function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    $.ajax({
      url: "deduction_process.php",
      method: "GET",
      data: { id: id },
      dataType: "json",
      success: function (data) {
        $("#edit_description").val(data.deduction_name);
        $("#edit_amount").val(data.deduction_amount);
        $("#edit_deductionID").val(data.deductionID);

        $("#editDeductionModal").modal("show");
      },
    });
  });

  // UPDATING DEDUCTION DATA
  $("#editDeductionForm").on("submit", function (e) {
    e.preventDefault();
    var id = $("#edit_deductionID").val();
    var description = $("#edit_description").val();
    var amount = $("#edit_amount").val();

    var formData = new FormData($("#editDeductionForm")[0]);
    formData.append("submit", "editDeductionData");

    validate_error = false;

    if (validateFloat(amount) == false) {
      $("#edit_amount").addClass("is-invalid");
      $("#edit_deduction_amount_error")
        .addClass("invalid-feedback")
        .text("invalid input.");
      validate_error = true;
    }
    $.ajax({
      url: "deduction_process.php",
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response == "success") {
          Swal.fire({
            icon: "success",
            text: "Updated successfully",
          });
          $("#editDeductionModal").modal("hide");
          setInterval(function () {
            location.reload();
          }, 1500);
        } else if (response == "failed!") {
          Swal.fire({
            icon: "error",
            title: "Ooops!",
            text: "There's a problem with database",
          });
        }
      },
    });
  });

  // REMOVE DEDUCTION DATA
  $(document).on("click", ".removeDeductionData", function () {
    var id = $(this).attr("id");
    console.log(id);
    Swal.fire({
      title: "Are you sure?",
      text: "data will be deleted.",
      icon: "warning",
      showCancelButton: true,
      cancelButtonColor: "#d33",
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Confirm",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "deduction_process.php",
          method: "POST",
          data: { id: id },
          success: function (response) {
            if (response == "success") {
              Swal.fire("Deleted!", "Data has been deleted.", "success");
              setInterval(function () {
                location.reload();
              }, 1000);
            }
          },
        });
      }
    });
  });

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // PAYROLL

  // FILTER WORKING DATE
  $("#generatePayrollForm").on("submit", function (e) {
    e.preventDefault();
    var fromDate = $("#fromDate").val();
    var toDate = $("#toDate").val();

    var formData = new FormData($("#generatePayrollForm")[0]);
    formData.append("submit", "generatePayroll");

    $.ajax({
      url: "payroll_process.php",
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        document.getElementById("result").innerHTML = response;
      },
    });
  });

  // PAYSLIP
  $("#extra2").on("click", ".payslipButton", function (e) {
    e.preventDefault();
    var currentRow = $(this).closest("tr");

    var totalWorkingHour = currentRow.find("td:eq(0)").text();
    var basicSalary = currentRow.find("td:eq(1)").text();
    var fromToDate = currentRow.find("td:eq(2)").text();
    var employeeName = currentRow.find("td:eq(3)").text();
    var employeeID = currentRow.find("td:eq(4)").text();
    var workingHour = currentRow.find("td:eq(5)").text();
    var ot = currentRow.find("td:eq(6)").text();
    var deduction = currentRow.find("td:eq(7)").text();
    var basicPay = currentRow.find("td:eq(8)").text();
    var hourlyRate = currentRow.find("td:eq(10)").text();
    var overTimeRate = currentRow.find("td:eq(11)").text();

    $("#display_employeeName").text(employeeName);
    $("#display_employeeID").text(employeeID);
    $("#display_fromToDate").text(fromToDate);
    $("#display_basicSalary").text(basicSalary);
    $("#display_hourlyRate").text(hourlyRate);
    $("#display_overTimeRate").text(overTimeRate);
    $("#display_totalWorkingHour").text(totalWorkingHour);
    $("#display_workingHour").text(workingHour);
    $("#display_overTime").text(ot);
    $("#display_deduction").text(deduction);
    $("#display_basicPay").text(basicPay);
    $("#payslipModal").modal("show");
  });

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // VALIDATIONS
  function onlyLetters(input) {
    return /^[A-Za-z\s]+$/.test(input);
  }

  function onlyNumbers(input) {
    return /^[0-9]+$/.test(input);
  }
  function validateFloat(input) {
    return /^-?([0-9]*\.?[0-9]+|[0-9]+\.?[0-9]*)$/.test(input);
  }

  function ValidateEmail(input) {
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(input);
  }
});
