<?php    
    include 'connect.php';
    //include 'readrecords.php';   
    require_once 'includes/header.php'; 
?>


  <body>

    <div class="first-page-login-page">
        <div class="login-form">
            <form method="post">
                <h3 class="open-sans-bold">Log in to ChumCode</h3>
                <div class="label-login">Username</div>
                <input name="txtUname" aria-invalid="false" aria-required="false" class="textbox-form" type="text">
                <div class="label-login">Password</div>
                <input name="txtPwd" aria-invalid="false" aria-required="false"class="textbox-form" type="password">
                <div class="forgot-pass open-sans-bold"><a href="">I forgot my password</a></div>

                <button class="submit-button open-sans-bold" type="submit" role="button" name="btnLogin" value="Login">Log in</button>

                <div class="signup-for-free">Not a member yet? <a href="register.php" class="open-sans-bold"> Sign up for free</a></div> 
              </form>
        </div>
    </div>
</body>

<?php
	session_start();
	$con= mysqli_connect("localhost","root","","dbcabilif1") 
		or die("Error in connection");
	if(isset($_POST['btnLogin'])){
		$uname=$_POST['txtUname'];
		$pwd=$_POST['txtPwd'];
		$sql ="select * from tbluseraccount where username='".$uname."'";
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
			exit();
		}
			
		
	}
		

?>

<?php
    require_once 'includes/footer1.php'; 
?>


