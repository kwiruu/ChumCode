<?php
include 'connect.php';
//include 'readrecords.php';   
require_once 'includes/header.php';
?>

<?php
    $userID = $_SESSION['userid'];
    $acctID = $_SESSION['acctid'];

    $query = "SELECT * FROM tbluserprofile WHERE userid = $userID";
    $query1 = "SELECT * FROM tbluseraccount WHERE acctid= $acctID";

    $result = mysqli_query($con, $query);
    $result1 = mysqli_query($con, $query1);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $row1 = mysqli_fetch_assoc($result1);
        $firstName = $row['firstname'];
        $lastName = $row['lastname'];
        $gender = $row['gender'];
        $bdate = $row['birthdate'];
        $email = $row1['emailadd'];
        $usertyper = $row1['usertype'];
    } else {
        $firstName = "Unknown";
        $lastName = "Unknown";
        $gender = "Unknown";
        $bdate = "Unknown";
    }
?>

<body>
        
    <div class="profile-page-first-page">
        <div>
            <div style="display:flex; flex-direction: row; width:100%; padding-bottom:0px; margin-bottom:0px; border-bottom:1px solid black;">
                <button class="toggle-button tab-button" style="width:7%;">Profile</button>
                <button class="toggle-button tab-button" style="width:10%; margin-left:1%;">Edit profile</button>
            </div>
        </div>
        <div style="width: 100%;
    padding-top: 5%;
    margin: auto;
    display: flex;">
        <div class="profile-main-box">
            
            <div class="page">
                <h1 class="space-mono-thin" style="color: black"><?php echo "$usertyper"; ?></h1>
                <h3 class="open-sans-bold" style="color: black">@<?php echo "$username"; ?></h3>
                    <div>
                        <p><?php echo "$firstName";?></p>
                        <p><?php echo "$lastName";?></p>
                        <p><?php echo "$gender"; ?></p>
                        <p><?php echo "$bdate"; ?></p>
                        <p><?php echo "$email"; ?></p>
                    </div>
            </div>
            <div class="page" style="display:none;">
                    <h1 class="space-mono-thin" style="color: black"><?php echo "$usertyper"; ?></h1>
                    <h3 class="open-sans-bold" style="color: black">@<?php echo "$username"; ?></h3>
                    <div>
                        <form action="profile.php" method="POST">
                            <p>First Name: <input type="text" name="firstName" value="<?php echo $firstName; ?>"></p>
                            <p>Last Name: <input type="text" name="lastName" value="<?php echo $lastName; ?>"></p>
                            <p>Gender: <input type="text" name="gender" value="<?php echo $gender; ?>"></p>
                            <p>Birthdate: <input type="date" name="bdate" value="<?php echo $bdate; ?>"></p>
                            <p>Email: <?php echo "$email"; ?></p>
                            <input type="submit" value="Save Changes">
                        </form>
                    </div>
                </div>
            </div>
         
        <div class="profile-right-box">
            <h5 class="open-sans-bold">Current Assignments</h5>
            <div class="assignment-box">

            </div>
        </div> 
        
        </div> 
        
        
    </div> 
    <div style="margin-top:5%;">
        <div style="height:500px;">
    </div>
    </div>
</body>

<script src="js/myhome-panel.js"></script>

<?php
require_once 'includes/footer1.php';
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $bdate = mysqli_real_escape_string($connection, $_POST['bdate']);

    // Update query
    $query = "UPDATE tbluserprofile SET firstname='$firstName', lastname='$lastName', gender='$gender', birthdate='$bdate' WHERE userid=$userID";

    // Execute query
    if (mysqli_query($connection, $query)) {
        echo "<script language='javascript'>
							alert('Profile Updated Successfully');
					  </script>";
    } else {
        echo "Error updating profile: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request";
}
?>