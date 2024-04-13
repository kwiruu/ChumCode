<?php
include 'connect.php';
//include 'readrecords.php';   
require_once 'includes/header.php';
?>

<body>
    <?php
    $sql = "SELECT * FROM tbluseraccount";
    $sql2 = "SELECT * FROM tbluserprofile";
    $sql3 = "SELECT * FROM tblactivityrecord";
    $result = mysqli_query($connection, $sql);
    $result2 = mysqli_query($connection, $sql2);
    $result3 = mysqli_query($connection, $sql3);
    ?>

    <div class="first-page-dashboard">
        <h3>tbluseraccount</h3>
        <table id="tbluseraccount" class="table">
            <thead class="thead">
                <tr>
                    <th>Seq Number</th>
                    <th>Email Address</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>User Type</th>
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
                        <td><a href="">View record</a><a href=""> Delete record</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <h3>tbluserprofile</h3>
        <table id=" tbluserprofile" class="table">
            <thead> `
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
                        <td><a href="">View record</a><a href=""> Delete record</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <h3>tblactivityrecord</h3>
        <table id=" tblactivityrecord" class="table">
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
                        <td><a href="">View record</a><a href=""> Delete record</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>



    </div>




</body>

<?php
require_once 'includes/footer1.php';
?>