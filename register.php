<?php
$username = $firstname = $lastname = $email = $password = "";
$errors = array(
  'username' => '', 'firstname' => '', 'lastname' => '',
  'email' => '', 'password' => ''
);

if (isset($_POST['btnRegister'])) {

  if (empty($_POST['username'])) {
    $errors['$username'] = 'Please enter a username.';
  } else {
    $username = $_POST['username'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $username)) {
      $errors['username'] = 'Please enter letters.';
    }
  }

  if (empty($_POST['firstname'])) {
    $errors['firstname'] = 'Please Enter Your firstname.';
  } else {
    $firstname = $_POST['firstname'];
    if (preg_match('/^[a-zA-Z\s]+$/', $firstname)) {
      $errors['firstname'] = 'Please enter letters.';
    }
  }

  if (empty($_POST['lastname'])) {
    $errors['lastname'] = 'Please Enter Your lastname.';
  } else {
    $lastname = $_POST['lastname'];
    if (preg_match('/^[a-zA-Z\s]+$/', $lastname)) {
      $errors['lastname'] = 'Please enter letters.';
    }
  }

  if (empty($_POST['email'])) {
    $errors['email'] = 'Please enter an email.';
  } else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Email must be a valid email address.';
    }
  }

  if (empty($_POST['password'])) {
    $errors['password'] = 'Please Enter a password.';
  }
}

?>

<?php
include 'connect.php';
//include 'readrecords.php';   
require_once 'includes/header.php';
?>


<body>

  <div class="first-page-register-page">
    <div class="main-box">
      <form id="registerForm" method="POST" action="register.php">
        <h3 class="open-sans-bold">Get started for free</h1>
          <div class="form-box1">
            <div class="left-box">
              <div class="container">
                <label class="label-login">Username</label><br>
                <input type="text" class="textbox-form" name="username" required><br>

                <label class="label-login">Email</label><br>
                <input type="text" class="textbox-form" name="email" required><br>

                <label class="label-login">Password</label><br>
                <input type="password" class="textbox-form" name="password" required><br>

                <label class="label-login">Birthday</label><br>
                <input type="date" class="textbox-form" name="birthdate"><br>



                <button type="submit" class="register-button" name="Register" value="Register">Sign Up</button>
              </div>
            </div>

            <div class="right-box1">
              <div class="container">
                <label class="label-login">First Name</label><br>
                <input type="text" class="textbox-form" name="firstname" required><br>

                <label class="label-login">Last Name</label><br>
                <input type="text" class="textbox-form" name="lastname" required><br>

                <label class="label-login">Gender</label><br>
                <select name="gender" class="form-select textbox-form" aria-label="Default select example">
                  <option selected value="male">Male</option>
                  <option value="female">Female</option>
                </select>
                <label class="label-login">Are you a</label><br>
                <input type="radio" value="student" name="user_type" id="studentRadio"> Student<br>
                <input type="radio" value="teacher" name="user_type" id="teacherRadio"> Teacher<br>
                <div id="studentFields" style="display: none;">
                  <label class="label-login">Grade Level</label><br>
                  <input type="number" class="textbox-form" name="gradelvl"><br>

                  <label class="label-login">Course</label><br>
                  <select name="course" class="form-select textbox-form" aria-label="Default select example">
                    <option selected value="bsit">BSIT</option>
                    <option value="bscs">BSCS</option>
                    <option value="etc">ETC</option>
                  </select>
                </div>

                <div id="teacherFields" style="display: none;">
                  <label class="label-login">Course</label><br>
                  <select name="course" class="form-select textbox-form" aria-label="Default select example">
                    <option selected value="bsit">BSIT</option>
                    <option value="bscs">BSCS</option>
                    <option value="etc">ETC</option>
                  </select>
                </div>
              </div>

            </div>
          </div>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var studentRadio = document.getElementById('studentRadio');
      var teacherRadio = document.getElementById('teacherRadio');
      var studentFields = document.getElementById('studentFields');
      var teacherFields = document.getElementById('teacherFields');

      studentRadio.addEventListener('change', function() {
        if (studentRadio.checked) {
          studentFields.style.display = 'block';
          teacherFields.style.display = 'none';
        }
      });

      teacherRadio.addEventListener('change', function() {
        if (teacherRadio.checked) {
          studentFields.style.display = 'none';
          teacherFields.style.display = 'block';
        }
      });
    });
  </script>

  </div>


  </div>
  <div class="container signin">
    <p>By creating an account you agree to our <a href="https://www.iubenda.com/en/help/2859-terms-and-conditions-when-are-they-needed#:~:text=%E2%80%9CTerms%20and%20Conditions%E2%80%9D%20is%20the,%E2%80%9D%20or%20%E2%80%9CLegal%20Notes%E2%80%9D.">Terms & Privacy</a>.</p>
    <p>Already have an account? <a href="login.php">Log in</a>.</p>
  </div>
</body>

<?php
require_once 'includes/footer.php';
?>

<?php
if (isset($_POST['Register'])) {
  //retrieve data from form and save the value to a variable
  //for tbluserprofile
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];


  //for tbluseraccount
  $email = $_POST['email'];
  $uname = $_POST['username'];
  $pword = $_POST['password'];
  $gender = $_POST['gender'];
  $birthd = $_POST['birthdate'];

  // for tblteacherrecord
  $course = $_POST['course'];
  // for tbltudentrecord only
  $gradelvl = $_POST['gradelvl'];

  $user_type = "";

  if (isset($_POST['student']) && $_POST['student'] == "student") {
    $user_type = "student";
  } elseif (isset($_POST['teacher']) && $_POST['teacher'] == "teacher") {
    $user_type = "teacher";
  }

  //save data to tbluserprofile			

  //Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.

  $sql2 = "Select * from tbluseraccount where username='" . $uname . "'";
  $result = mysqli_query($connection, $sql2);
  $row = mysqli_num_rows($result);

  if ($row == 0) {
    $sql = "Insert into tbluseraccount(emailadd,username,password,user_type) values('" . $email . "','" . $uname . "','" . $pword . "', '" . $user_type . "')";
    $sql1 = "Insert into tbluserprofile(firstname,lastname,gender,birthdate) values('" . $fname . "','" . $lname . "','" . $gender . "', '" . $birthd . "')";
    $sql12 = "Insert into tblstudentrecord(course,gradelvl) values('" . $course . "', '" . $gradelvl . "')";
    $sql13 = "Insert into tblteacherrecord(course) values('" . $course . "')";

    mysqli_query($connection, $sql);
    mysqli_query($connection, $sql1);
    mysqli_query($connection, $sql12);
    mysqli_query($connection, $sql13);

    echo "<script language='javascript'>
						alert('New record saved.');
				  </script>";
  } else {
    echo "<script language='javascript'>
						alert('Username already existing');
				  </script>";
  }
}


?>