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
        <div class="profile-main-box">
        <h1 class="space-mono-thin" style="color: black"><?php echo "$usertyper"; ?></h1>
        <h3 class="open-sans-bold" style="color: black">@<?php echo "$username"; ?></h3>
            <div>
                <p><?php echo "$firstName $lastName"; ?></p>
                <p><?php echo "$gender"; ?></p>
                <p><?php echo "$bdate"; ?></p>
                <p><?php echo "$email"; ?></p>
            </div>
        </div>  
        <div class="profile-right-box">
            <h5 class="open-sans-bold">Current Assignments</h5>
            <div class="assignment-box">

            </div>
        </div> 
    </div>
    <div style="margin-top:5%;">
        <div style="height:500px;">
    </div>
    </div>
</body>

<?php
require_once 'includes/footer1.php';
?>