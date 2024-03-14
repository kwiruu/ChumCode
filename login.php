<?php    
    include 'connect.php'; 
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

    <div class="first-page-login-page">
        <div class="login-form">
            <form>
                <h3 class="open-sans-bold">Log in to ChumCode</h3>
                <div class="label-login">Email or username</div>
                <input name="txtUname" aria-invalid="false" aria-required="false" class="textbox-form" type="text">
                <div class="label-login">Password</div>
                <input name="txtPwd" aria-invalid="false" aria-required="false"class="textbox-form" type="password">
                <div class="forgot-pass open-sans-bold"><a href="">I forgot my password</a></div>

                <button class="submit-button open-sans-bold" type="submit" role="button" name="btnLogin" value="Login">Log in</button>

                <div class="signup-for-free">Not a member yet? <a href="register.php" class="open-sans-bold"> Sign up for free</a></div>
            </form>
        </div>
    </div>

    
    

    <footer>
      <hr>
      <p class="open-sans-regular small-font"> Privacy Policy | Cookie Policy | Do Not Sell My Personal Information | Terms</p>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>

<?php
	session_start();
	$con= mysqli_connect("localhost","root","","dbcabilif1") 
		or die("Error in connection");
	echo "connected";
	if(isset($_POST['btnLogin'])){
		$uname=$_POST['txtUname'];
		$pwd=$_POST['txtPwd'];
		$sql ="select * from trainee where username='".$uname."'";
		$result = mysqli_query($con,$sql);
		$count = mysqli_num_rows($result);
		
		$row = mysqli_fetch_array($result);
		
		if($count== 0){
			echo "<script language='javascript'>
						alert('username not existing.');
				  </script>";
		}else if($row[1] != $pwd) {
			echo "<script language='javascript'>
						alert('Incorrect password');
				  </script>";
		}else{
			$_SESSION['username']=$row[0];
			header("location: index.php");
      exit;
		}
			
		
	}
		

?>