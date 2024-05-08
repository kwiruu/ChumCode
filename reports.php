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

<?php
// Count total number of students
$sql_students = "SELECT COUNT(*) AS total_students FROM tbluseraccount WHERE usertype = 'student'";
$result_students = mysqli_query($connection, $sql_students);
$row_students = mysqli_fetch_assoc($result_students);
$total_students = $row_students['total_students'];

// Count total number of teachers
$sql_teachers = "SELECT COUNT(*) AS total_teachers FROM tbluseraccount WHERE usertype = 'teacher'";
$result_teachers = mysqli_query($connection, $sql_teachers);
$row_teachers = mysqli_fetch_assoc($result_teachers);
$total_teachers = $row_teachers['total_teachers'];

// Calculate the average number of students and teachers
$total_users = $total_students + $total_teachers;
$average_students = $total_students / $total_users * 100; // Percentage
$average_teachers = $total_teachers / $total_users * 100; // Percentage

$sql_bscs_students = "SELECT COUNT(*) AS total_bscs_students, AVG(gradelvl) AS avg_bscs_grade_level FROM tblstudentrecord WHERE course = 'BSCS'";
$result_bscs_students = mysqli_query($connection, $sql_bscs_students);
$row_bscs_students = mysqli_fetch_assoc($result_bscs_students);
$total_bscs_students = $row_bscs_students['total_bscs_students'];
$avg_bscs_grade_level = $row_bscs_students['avg_bscs_grade_level'];

// Query to count the total number of BSIT students and the total number of grade levels
$sql_bsit_students = "SELECT COUNT(*) AS total_bsit_students, AVG(gradelvl) AS avg_bsit_grade_level FROM tblstudentrecord WHERE course = 'BSIT'";
$result_bsit_students = mysqli_query($connection, $sql_bsit_students);
$row_bsit_students = mysqli_fetch_assoc($result_bsit_students);
$total_bsit_students = $row_bsit_students['total_bsit_students'];
$avg_bsit_grade_level = $row_bsit_students['avg_bsit_grade_level'];


$sql_activity_stats = "SELECT COUNT(*) AS total_activities, AVG(DATEDIFF(dueDate, CURDATE())) AS avg_deadline_days FROM tblactivityrecord";
$result_activity_stats = mysqli_query($connection, $sql_activity_stats);
$row_activity_stats = mysqli_fetch_assoc($result_activity_stats);
$total_activities = $row_activity_stats['total_activities'];
$avg_deadline_days = $row_activity_stats['avg_deadline_days'];

$chart_labels = ["Total Students", "Total Teachers", "Total BSCS Students", "Total BSIT Students", "Total Activities"];
$chart_data = [$total_students, $total_teachers, $total_bscs_students, $total_bsit_students, $total_activities];

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
            <h2>Statistics</h2>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Total Students</th>
                    <th>Average Students (%)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $total_students; ?></td>
                    <td><?php echo round($average_students, 2); ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Total Teachers</th>
                    <th>Average Teachers (%)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $total_teachers; ?></td>
                    <td><?php echo round($average_teachers, 2); ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Total BSCS Students</th>
                    <th>Average Grade Level</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $total_bscs_students; ?></td>
                    <td><?php echo round($avg_bscs_grade_level, 2); ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Total BSIT Students</th>
                    <th>Average Grade Level</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $total_bsit_students; ?></td>
                    <td><?php echo round($avg_bsit_grade_level, 2); ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Total Activities</th>
                    <th>Average Deadline (Days)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $total_activities; ?></td>
                    <td><?php echo round($avg_deadline_days, 2); ?></td>
                </tr>
            </tbody>
        </table>

        <div class="first-page-dashboard">
        <h2>Statistics</h2>
        <canvas id="statisticsChart" width="400" height="200"></canvas>
    </div>

    <script>
        // Get the canvas element
        var ctx = document.getElementById('statisticsChart').getContext('2d');

        // Create the chart
        var statisticsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($chart_labels); ?>,
                datasets: [{
                    label: 'Average',
                    data: <?php echo json_encode($chart_data); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    </div>
</body>


<?php
require_once 'includes/footer.php';
?>
