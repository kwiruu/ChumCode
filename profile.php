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

    $result = mysqli_query($connection, $query);
    $result1 = mysqli_query($connection, $query1);

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
        <br>
        <br>
    <div class="profile-page-first-page">
        <div class="yellow-top" style="height:50px">
        </div>
        <div class="profile-page-first-page-container">
            <p class="open-sans-bold" style="margin-bottom:2%; font-size:20px">@<?php echo "$username"; ?>'s Profile</p>
            <div style="display:flex; flex-direction:row; justify-content: space-between;">
                <div class="profile-page-buttons">
                    <button class="toggle-button" style="margin-bottom:0px; background-color:white">Profile</button>
                    <button class="toggle-button" style="margin-bottom:0px; background-color:white">Edit profile</button>
                    <button class="toggle-button" style="margin-bottom:0px; background-color:white">Settings</button>
                </div>

                <div class="profile-main-box page">
                    <div class="name-box">
                        <h5 class="open-sans-bold"><?php echo "$firstName";?> <?php echo "$lastName";?></h5>
                    </div>
                    <div class="profile-pic-box">
                        <h6 style="margin-bottom:0px;">Profile image</h6>
                        <div style="display:flex;flex-direction:row;justify-content: space-around;margin-left:15%">
                            <img src="user-profiles/1.png" alt="profile-pic">
                            <div style="display:flex;flex-direction:row;justify-content: space-around;width:50%;">
                            </div>
                        </div>
                    </div>
                    <div class="username-box">
                    <div style="display:flex;">
                            <h6 style="margin-bottom:0px; width:20%;">Username</h6>
                            <div class="username-box-container">
                                <h6 style="margin-bottom:0px;"><?php echo "$username"; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="personal-info-box">
                        <div style="display:flex;margin-bottom:3%">
                            <h6 style="margin-bottom:0px; width:20%;">First name</h6>
                            <div class="username-box-container">
                                <h6 style="margin-bottom:0px;"><?php echo "$firstName"; ?></h6>
                            </div>
                        </div>
                        <div style="display:flex;margin-bottom:3%">
                            <h6 style="margin-bottom:0px; width:20%;">Last name</h6>
                            <div class="username-box-container">
                                <h6 style="margin-bottom:0px;"><?php echo "$lastName"; ?></h6>
                            </div>
                        </div>
                        <div style="display:flex; margin-bottom:3%;">
                            <div style="display:flex;width:50%">
                                <h6 style="margin-bottom:0px; width:40%;">Gender</h6>
                                <div class="username-box-container" style="width:40%">
                                    <h6 style="margin-bottom:0px; margin-left:4%;"><?php echo "$gender"; ?></h6>
                                </div>
                            </div>
                            <div style="display:flex;width:50%">
                                <h6 style="margin-bottom:0px; width:40%;">Birth Date</h6>
                                <div class="username-box-container" style="width:44%">
                                    <h6 style="margin-bottom:0px;  margin-left:4%;"><?php echo "$bdate"; ?></h6>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;">
                            <h6 style="margin-bottom:0px; width:20%;">Email</h6>
                            <div class="username-box-container">
                                <h6 style="margin-bottom:0px;"><?php echo "$email"; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="usertype-box">
                        <div style="display:flex;">
                            <h6 style="margin-bottom:0px; width:20%;">User Type</h6>
                            <div class="username-box-container">
                                <?php if ($usertyper == "teacher") { ?>
                                    <h6 style="margin-bottom:0px;">Teacher</h6>
                                <?php } ?>
                                <?php if ($usertyper == "student") { ?>
                                    <h6 style="margin-bottom:0px;">Student</h6>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="profile-main-box page" style="display:none;">
                    <div class="name-box">
                        <h5 class="open-sans-bold"><?php echo "$firstName";?> <?php echo "$lastName";?></h5>
                    </div>
                    <div class="profile-pic-box active">
                        <h6 style="margin-bottom:0px;">Profile image</h6>
                        <div style="display:flex;flex-direction:row;justify-content: space-around;margin-left:15%">
                            <img src="user-profiles/1.png" alt="profile-pic">
                            <div style="display:flex;flex-direction:row;justify-content: space-around;width:50%;">
                                <button class="open-sans-regular">Upload</button>
                                <button class="open-sans-regular" style="width:40%;color:#3a10e5;background-color:white;border:1px solid #3a10e5">Remove</button>
                            </div>
                        </div>
                    </div>
                    <form action="profile.php" method="POST" style="margin-bottom:0px;">
                    <div class="username-box">
                    <div style="display:flex;">
                            <h6 style="margin-bottom:0px; width:20%;">Username</h6>
                            <div class="username-box-container">
                                <h6 style="margin-bottom:0px;"><?php echo "$username"; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="personal-info-box">
                        <div style="display:flex;margin-bottom:3%">
                            <h6 style="margin-bottom:0px; width:20%;">First name</h6>
                            <input type="text" name="firstName" value="<?php echo $firstName; ?>" class="username-box-container2" style="font-weight:600;margin-bottom:0px">
                                </input>
                        </div>
                        <div style="display:flex;margin-bottom:3%">
                            <h6 style="margin-bottom:0px; width:20%;">Last name</h6>
                            <input type="text" name="lastName" value="<?php echo $lastName; ?>" class="username-box-container2" style="font-weight:600;margin-bottom:0px">
                                </input>
                        </div>
                        <div style="display:flex; margin-bottom:3%;">
                            <div style="display:flex;width:50%">
                                <h6 style="margin-bottom:0px; width:40%;">Gender</h6>
                                <select name="gender" class="username-box-container2" value="<?php echo $gender; ?>" style="font-weight:600;margin-bottom:0px;width:40%;">
                                    <option selected value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div style="display:flex;width:50%">
                                <h6 style="margin-bottom:0px; width:40%;">Birth Date</h6>
                                <input type="date" name="bdate" value="<?php echo $bdate; ?>" class="username-box-container2" style="font-weight:600;margin-bottom:0px;width:44%;">
                                </input>
                            </div>
                        </div>
                        <div style="display:flex;">
                            <h6 style="margin-bottom:0px; width:20%;">Email</h6>
                            <div class="username-box-container">
                                <h6 style="margin-bottom:0px;"><?php echo "$email"; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="usertype-box2">
                        <div style="display:flex;">
                            <h6 style="margin-bottom:0px; width:20%;">User Type</h6>
                            <div class="username-box-container2">
                                <?php if ($usertyper == "teacher") { ?>
                                    <h6 style="margin-bottom:0px;">Teacher</h6>
                                <?php } ?>
                                <?php if ($usertyper == "student") { ?>
                                    <h6 style="margin-bottom:0px;">Student</h6>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="submit-box" style="width:100%;">
                        <input class="submit-button-profile" type="submit" value="Save Changes" style="margin:auto; width:20%;"></input>
                    <div>
                </div>
            </div> 
        </div>
    </div>
   </div>
</div>
<br>
<br>
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