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
  <div class="activity-first-page">
    <div class="insert-act-box">
      <p class="space-mono-thin" style="color: black">Teacher's View</p>
      <h2 class="open-sans-bold" style="color: black">Assign Activities</h2>
      <div class="left-box-act">
        <form id="registerForm" method="POST">
          <div class="container">
            <label class="label-login">Activity Name</label><br>
            <input type="text" class="textbox-form" name="actName" required><br>

            <label class="label-login">Description</label><br>
            <textarea type="text" class="textbox-form desBox" name="actDes" required></textarea><br>
          </div>
          <div class="two-div-beside">
            <div>
              <label class="label-login">Due Date</label><br>
              <input type="date" class="textbox-form" name="dueDate"><br>
            </div>
            <button type="submit" class="register-button-act" name="assignAct" value="assignAct">Assign Activity</button>
          </div>
        </form>
      </div>
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