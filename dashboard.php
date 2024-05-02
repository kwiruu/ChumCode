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
    <?php
    $sql = "SELECT * FROM tbluseraccount";
    $sql2 = "SELECT * FROM tbluserprofile";
    $sql3 = "SELECT * FROM tblactivityrecord";
    $sql4 = "SELECT * FROM tblcourse";
    $result = mysqli_query($connection, $sql);
    $result2 = mysqli_query($connection, $sql2);
    $result3 = mysqli_query($connection, $sql3);
    $result4 = mysqli_query($connection, $sql4);

    ?>

    <div class="first-page-dashboard">
        <h3>tbluseraccount</h3>
        <table id="tbluseraccount" class="table">
            <thead>
                <tr>
                    <th>Seq Number</th>
                    <th>Email Address</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['acctid'] ?></td>
                        <td><?php echo $row['emailadd'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['usertype'] ?></td>
                        <td>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="id_delete_user" value="<?php echo $row['acctid']; ?>">
                                <button type="submit" name="delete_user">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <h3>tbluserprofile</h3>
        <table id="tbluserprofile" class="table">
            <thead>
                <tr>
                    <th>Seq Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Birth Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result2->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['userid'] ?></td>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['birthdate'] ?></td>
                        <td>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="id_delete_profile" value="<?php echo $row['userid']; ?>">
                                <button type="submit" name="delete_profile">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <h3>tblactivityrecord</h3>
        <table id="tblactivityrecord" class="table">
            <thead>
                <tr>
                    <th>Seq Number</th>
                    <th>Activity Name</th>
                    <th>Activity Description</th>
                    <th>Due Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result3->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['activityID'] ?></td>
                        <td><?php echo $row['activityName'] ?></td>
                        <td><?php echo $row['activityDescription'] ?></td>
                        <td><?php echo $row['dueDate'] ?></td>
                        <td>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="id_delete_activity" value="<?php echo $row['activityID']; ?>">
                                <button type="submit" name="delete_activity">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <h3>tblcourse</h3>
        <table id="tblactivityrecord" class="table">
            <thead>
                <tr>
                    <th>Seq Number</th>
                    <th>Course Name</th>
                    <th>Course Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result4->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['courseID'] ?></td>
                        <td><?php echo $row['courseName'] ?></td>
                        <td><?php echo $row['courseDescription'] ?></td>
                        <td>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="id_delete_activity" value="<?php echo $row['courseID']; ?>">
                                <button type="submit" name="delete_activity">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

<?php
require_once 'includes/footer.php';
?>
