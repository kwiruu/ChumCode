<?php
include 'connect.php';
//include 'readrecords.php';   
require_once 'includes/header.php';
?>

<body>
  <?php
  $sql = "SELECT * FROM tblactivityrecord";
  $result = mysqli_query($connection, $sql);
  ?>
  <div>
    <div class="second-page-main-page">

      <p class="space-mono-thin" style="color: black">Student's View</p>
      <h2 class="open-sans-bold" style="color: black">Pending Activities</h2>

      <div class="course-container-main-box-act">
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
          <div class="course-container-act">

            <div class="course-box-2">
              <div class="course-box-top-box-2 space-mono-thin"><?php echo $row['activityID'] ?></div>
              <h5 class="open-sans-regular"><?php echo $row['activityName'] ?></h3>
                <span class="open-sans-regular"><?php echo $row['activityDescription'] ?></span>
                <div class="course-container-footer open-sans-bold"><?php echo $row['dueDate'] ?></div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>


    </div>
</body>

<?php
require_once 'includes/footer1.php';
?>

<?php
if (isset($_POST['assignAct'])) {
  //for tbluserprofile
  $Aname = $_POST['actName'];
  $Ddate = $_POST['dueDate'];

  $Ades = $_POST['actDes'];

  $sqlAct = "Insert into tblactivityrecord(activityname,activitydescription,duedate) values('" . $Aname . "','" . $Ades . "','" . $Ddate . "')";

  mysqli_query($connection, $sqlAct);

  echo "<script language='javascript'>
						alert('New Activity Created.');
				  </script>";
}


?>