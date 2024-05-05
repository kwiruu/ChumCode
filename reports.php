<?php
include 'connect.php';
require_once 'includes/header.php';

if(isset($_POST['delete_user'])){
    $id_delete_user = mysqli_real_escape_string($connection, $_POST['id_delete_user']);

    $sql = "DELETE FROM tbluseraccount WHERE acctid = $id_delete_user";

    if(!mysqli_query($connection, $sql)){
        echo 'Query Error: ' . mysqli_error($connection);
    }else{
        echo '<script>alert("User record deleted successfully!");</script>';
    }
}

if(isset($_POST['delete_profile'])){
    $id_delete_profile = mysqli_real_escape_string($connection, $_POST['id_delete_profile']);

    $sql = "DELETE FROM tbluserprofile WHERE userid = $id_delete_profile";

    if(!mysqli_query($connection, $sql)){
        echo 'Query Error: ' . mysqli_error($connection);
    }else{
        echo '<script>alert("Profile record deleted successfully!");</script>';
    }
}

if(isset($_POST['delete_activity'])){
    $id_delete_activity = mysqli_real_escape_string($connection, $_POST['id_delete_activity']);

    $sql = "DELETE FROM tblactivityrecord WHERE activityID = $id_delete_activity";

    if(!mysqli_query($connection, $sql)){
        echo 'Query Error: ' . mysqli_error($connection);
    }else{
        echo '<script>alert("Activity record deleted successfully!");</script>';
    }
}

?>

<body>
<div class="first-page-dashboard">
<?php

    $sql = "SELECT * FROM tbluseraccount ORDER BY CASE WHEN usertype = 'teacher' THEN 1 ELSE 2 END, usertype";

    $result = mysqli_query($connection, $sql);

    // Display tbluseraccount table
    echo '<h2>tbluseraccount Table (Sorted)</h2>';
    echo '<table class="table table-dark">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">ID</th>';
    echo '<th scope="col">Email</th>';
    echo '<th scope="col">Username</th>';
    echo '<th scope="col">User Type</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['acctid'] . '</td>';
        echo '<td>' . $row['emailadd'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['usertype'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    // Display tblstudentrecord table
    $sql2 = "SELECT gradelvl,
                   SUM(CASE WHEN course = 'BSCS' THEN 1 ELSE 0 END) AS BSCS_count,
                   SUM(CASE WHEN course = 'BSIT' THEN 1 ELSE 0 END) AS BSIT_count
            FROM tblstudentrecord
            GROUP BY gradelvl";
    $result2 = mysqli_query($connection, $sql2);

    // Display tblstudentrecord table
    echo '<h2>tblstudentrecord Table Course Count</h2>';
    echo '<table class="table table-dark">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Grade Level</th>';
    echo '<th scope="col">BSCS Count</th>';
    echo '<th scope="col">BSIT Count</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row2 = mysqli_fetch_assoc($result2)) {
        echo '<tr>';
        echo '<td>' . $row2['gradelvl'] . '</td>';
        echo '<td>' . $row2['BSCS_count'] . '</td>';
        echo '<td>' . $row2['BSIT_count'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';



    // SQL query to select records from tblactivityrecord and group by date
    $sql3 = "SELECT DATE(dueDate) AS dueDate_day, 
                   COUNT(*) AS activityCount
            FROM tblactivityrecord
            GROUP BY DATE(dueDate)";

    $result3 = mysqli_query($connection, $sql3);

    // Display tblactivityrecord table
    echo '<h2>tblactivityrecord Table</h2>';
    echo '<table class="table table-dark">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Due Date (Day)</th>';
    echo '<th scope="col">Activity Count</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row3 = mysqli_fetch_assoc($result3)) {
        echo '<tr>';
        echo '<td>' . $row3['dueDate_day'] . '</td>';
        echo '<td>' . $row3['activityCount'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    ?>
</div>
</body>

<?php
require_once 'includes/footer.php';
?>
