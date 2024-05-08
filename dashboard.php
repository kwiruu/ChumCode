<?php
include 'connect.php';
require_once 'includes/header.php';

if(isset($_POST['delete_user'])){
    $user_id = $_POST['id_delete_user'];
    // Update the user record to mark it as inactive (isActive = 0)
    $sql_delete_user = "UPDATE tbluseraccount SET isActive = 0 WHERE acctid = $user_id";
    if(mysqli_query($connection, $sql_delete_user)){
        echo '<script>alert("User record deleted successfully!");</script>';
    } else {
        echo '<script>alert("Failed to delete user record!");</script>';
    }
}

if(isset($_POST['delete_profile'])){
    echo '<script>alert("Profile record deleted successfully!");</script>';
}

if(isset($_POST['delete_activity'])){
    echo '<script>alert("Activity record deleted successfully!");</script>';
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
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Seq Number</th>
                    <th>Email Address</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>User Type</th>
                    <th>isActive</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr id="user_<?php echo $row['acctid']; ?>">
                        <td><?php echo $row['acctid'] ?></td>
                        <td><?php echo $row['emailadd'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['usertype'] ?></td>
                        <td><?php echo $row['isActive'] ?></td>
                        <td>
                        <form class="delete-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Seq Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Birth Date</th>
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
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <h3>tblactivityrecord</h3>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Seq Number</th>
                    <th>Activity Name</th>
                    <th>Activity Description</th>
                    <th>Due Date</th>
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
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <h3>tblcourse</h3>
        <table class="table table-dark">
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
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script src="js/myhome-panel.js"></script>

<script>
    $(document).ready(function(){
        $('.delete-form').submit(function(e){
            e.preventDefault();
            var form = $(this);
            var row = form.closest('tr');
            // Remove the row from the DOM
            row.fadeOut(500, function(){
                row.remove();
            });
            // Additional code to show success message if needed
        });
    });
</script>
<?php
require_once 'includes/footer.php';
?>
