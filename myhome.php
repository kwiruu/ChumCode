<?php    
    include 'connect.php';
    //include 'readrecords.php';   
    require_once 'includes/header.php'; 
?>

<body>

    <div class="first-page-myhome">
        <div class="dashboard-holder">
            <div class="dashboard-left-panel">
                <button id="courseButton" class="toggle-button active"><i class="fa-regular fa-bookmark" style="margin-right:5%;"></i> Course</button>
                <button id="activitiesButton" class="toggle-button"><i class="fa-regular fa-folder-open" style="margin-right:5%;"></i> Activities</button>
                <button id="activitiesButton" class="toggle-button"><i class="fa-regular fa-pen-to-square" style="margin-right:5%;"></i> Assign Activities</button>
                <button id="workspacesButton" class="toggle-button"><i class="fa-solid fa-code" style="margin-right:5%;"></i> Workspaces</button>
            </div>
            <div class="dashboard-right-panel">
                <div id="coursePage" class="page">
                    Course Page Content
                </div>

                <div id="activitiesPage" class="page" style="display: none;">
                    Activities Page Content
                </div>

                <div id="assignActivitiesPage" class="page" style="display: none;">
                    <div class="whitebg">
                         <?php
                        $sql = "SELECT * FROM tblactivityrecord";
                        $result = mysqli_query($connection, $sql);
                        ?>
                        <div class="activity-first-page-2">
                            <div class="yellow-top"></div>
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
                                        <div style="margin-left:7%">
                                        <label class="label-login">Course</label><br>
                                        <input type="text" class="textbox-form" name=""><br>
                                        </div>
                                        
                                    </div>
                                    <button type="submit" class="register-button-act" name="assignAct" value="assignAct" ><i class="fa-solid fa-arrow-right" style="font-size:40px"></i></button>
                                    <div class="span-text"><p>Assign Activity</p></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="workspacesPage" class="page" style="display: none;">
                    <h4 style="font-weight:700;">My Workspaces</h4>
                    <div class="header-box-tab">
                        <button class="tab-button">main.c</button>
                        <button class="run-button" id="showTextareaButton">Run</button>
                    </div>
                    <div class="compiler-box">
                        <div style="display:flex; flex-direction: column; width:2%; text-align: center; background-color: #f1f1f3;"><p>1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16</p>
                        </div>
                    <textarea type="text" class="compiler-textbox">// Online Java Compiler
// Use this editor to write, compile and run your Java code online

class HelloWorld {
    public static void main(String[] args) {
        System.out.println("HelloWorld");
    }
}</textarea>

<textarea id="myTextarea" type="text" class="compiler-textbox" style="display:none; border-right:none;">HelloWorld</textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

<script src="js/myhome-panel.js"></script>

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