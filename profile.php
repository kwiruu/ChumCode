<?php
include 'connect.php';
//include 'readrecords.php';   
require_once 'includes/header.php';
?>

<?php
    $userID = $_SESSION['user_id'];

    $query = "SELECT * FROM tbluserprofile WHERE id = $userID";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['firstname'];
        $lastName = $row['lastname'];
        $gender = $row['gender'];
        $bdate = $row['birthdate'];
    } else {
        $firstName = "Unknown";
        $lastName = "Unknown";
        $gender = "Unknown";
        $bdate = "Unknown";
    }
?>

<body>
    <div class="profile-page-first-page">
        <div class="profile-main-box shadow-box">
        <p class="space-mono-thin" style="color: black"><?php echo "$username"; ?></p>
        <h2 class="open-sans-bold" style="color: black"><?php echo "$firstName's Profile"; ?></h2>
            <div>
                <h5><?php echo "$firstName $lastName"; ?></h5>
                <h5><?php echo "$gender"; ?></h5>
                <h5><?php echo "$birthdate"; ?></h5>
            </div>
        </div>   
    </div>
    <div class="blue-bg" style="margin-top:5%;">
        <div style="height:500px;">
    </div>
    </div>
</body>

<?php
require_once 'includes/footer1.php';
?>