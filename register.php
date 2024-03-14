<?php    
    include 'connect.php';
    //include 'readrecords.php';   
    //require_once 'includes/header.php'; 
?>

<html lang="en">
  <head>
    <script src="js/styles.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:wght@300;400;500;600;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Space+Mono:wght@400;700&family=UnifrakturMaguntia&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>ChumCode</title>
  </head>

  <header>
    <nav class="open-sans-regular">
        <a href="index.php" class="space-mono-bold">ChumCode</a>
        <a href="">Catalog</a>
        <a href="">Resources</a>
        <a href="">Problems</a>
        <i class="fa-solid fa-magnifying-glass left"></i>
        <a href="login.php" class="open-sans-bold">Log In</a>
    </nav>
  </header>
  <body>

  <div class="first-page-register-page">
    <div class="main-box">
      <form method="post">
        <h3 class="open-sans-bold">Get started for free</h1>
        <div class="form-box1">
        <div class="left-box">
            <div class="container">
            
            <label class="label-login">Username</label><br>
            <input type="text" class="textbox-form"  name="txtusername" required><br>
        
            <label class="label-login">Email</label><br>
            <input type="text" class="textbox-form"  name="txtemail" required><br>
        
            <label class="label-login">Password</label><br>
            <input type="password" class="textbox-form" name="txtpassword" required><br>
        
            <label class="label-login">Birthday</label><br>
            <input type="date" class="textbox-form" name="birthday">
            </div>
    
        </div>

        <div class="right-box1">

            <div class="container"> 
            <label class="label-login" >First Name</label><br>
            <input type="text" class="textbox-form"  name="txtfirstname" required><br>
        
            <label class="label-login">Last Name</label><br>
            <input type="text" class="textbox-form" name="txtlastname" required><br>
        
            <label class="label-login">Gender</label><br>
            <select name="gender" name="selectgender" class="form-select textbox-form" aria-label="Default select example">
                <option selected value="male">Male</option>
                <option value="female">Female</option>
            </select>
            </div>
        </form>
        <button type="submit" class="register-button" name="btnRegister" value="Register">Sign Up</button>
    </div>
    
  </div>
</div>


</div>
  <div class="container signin">
    <p>By creating an account you agree to our <a href="https://www.iubenda.com/en/help/2859-terms-and-conditions-when-are-they-needed#:~:text=%E2%80%9CTerms%20and%20Conditions%E2%80%9D%20is%20the,%E2%80%9D%20or%20%E2%80%9CLegal%20Notes%E2%80%9D.">Terms & Privacy</a>.</p>
    <p>Already have an account? <a href="login.html">Log in</a>.</p>
  </div>
  

    
    

    <footer>
      <hr>
      <p class="open-sans-regular small-font"> Mars Benitez</p>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>


<?php	
	if(isset($_POST['btnRegister'])){		
		//retrieve data from form and save the value to a variable
		//for tbluserprofile
		$fname=$_POST['txtfirstname'];		
		$lname=$_POST['txtlastname'];
		
		
		//for tbluseraccount
		$email=$_POST['txtemail'];		
		$uname=$_POST['txtusername'];
		$pword=$_POST['txtpassword'];
		
		//save data to tbluserprofile			
		$sql1 ="Insert into tbluserprofile(firstname,lastname) values('".$fname."','".$lname."')";
		
		
		//Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
		$sql2 ="Select * from tbluseraccount where username='".$uname."'";
		$result = mysqli_query($connection,$sql2);
		$row = mysqli_num_rows($result);
		if($row == 0){
      mysqli_query($connection,$sql1);
			$sql ="Insert into tbluseraccount(emailadd,username,password) values('".$email."','".$uname."','".$pword."')";
			mysqli_query($connection,$sql);
			echo "<script language='javascript'>
						alert('New record saved.');
				  </script>";

          header("Location: index.php");
          exit;

		}else{
			echo "<script language='javascript'>
						alert('Username already existing');
				  </script>";
		}
			
		
	}
		

?>