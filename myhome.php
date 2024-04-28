<?php    
    include 'connect.php';
    //include 'readrecords.php';   
    require_once 'includes/header.php'; 
    //Bag o Ni boss
    $userId = $_SESSION['acctid']; 
    $query = "SELECT usertype FROM tbluseraccount WHERE acctid = $userId";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $userType = $row['usertype'];
?>

<body>

    <div class="first-page-myhome">
        <div class="dashboard-holder">
            <div class="dashboard-left-panel">
                <button id="courseButton" class="toggle-button active"><i class="fa-regular fa-bookmark" style="margin-right:5%;"></i> Course</button>
                <button id="activitiesButton" class="toggle-button"><i class="fa-regular fa-folder-open" style="margin-right:5%;"></i> Activities</button>
                <button id="assignactivitiesButton" class="toggle-button"><i class="fa-regular fa-pen-to-square" style="margin-right:5%;"></i> Assign Activities</button>
                <button id="workspacesButton" class="toggle-button"><i class="fa-solid fa-code" style="margin-right:5%;"></i> Workspaces</button>
            </div>
            <div class="dashboard-right-panel">
                <div id="coursePage" class="page">
                    <div>
                    <h4>Courses</h4>
                    <hr style="border-width: 1px; border-color: black;">
                    <!--show add button if teacher ang user -->
                    <?php if ($userType == "teacher") { ?>
                        <button type="button" class="addcourse-button" onclick="openAddActivityPopup()"> Add Activity <i class="fa-solid fa-plus"></i></button><br>
                    <?php } ?>
                    <div id="addActivityModal" class="modal">
                        <div class="modal-content">
                            <div class="box-for-close"><button class="close" onclick="closeAddActivityPopup()">&times;</button></div>
                            <h2>Add Course</h2>
                            <form id="addActivityForm" method="POST">
                                <label for="activityName">Course Name:</label><br>
                                <input type="text" id="activityName" name="courseName" required>
                                <br>
                                <label for="activityDescription">Course Description:</label><br>
                                <textarea id="activityDescription" name="courseDescription" required></textarea><br>
                                <button type="submit" class="addCourse-button" name="addCourse" value="addCourse">Add Course</button>
                            </form>
                        </div>
                    </div>

                    <!-- adds courses if naa. shows empty if wala -->
                    <div class="course-container-main-box-act">
                        <?php
                            if($userType == "teacher"){
                                $sql = "SELECT * FROM tblcourse WHERE courseID IN (SELECT courseID FROM tblcourseteacher WHERE teacherID = (SELECT teacherID FROM tblteacherrecord WHERE acctid_fk_teacherrecord = $userId))";
                            } else if($userType == "student"){
                                $sql = "SELECT * FROM tblcourse WHERE courseID IN (SELECT courseID FROM tblcourseStudent WHERE studentID = (SELECT studentID FROM tblstudentrecord WHERE acctid_fk_studentrecord = $userId))";
                            }
                            
                            $result = mysqli_query($connection, $sql);
                        ?>
                        <?php
                            if(mysqli_num_rows($result) > 0) {
                                while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="course-container-act">
                            <div class="course-box-2">
                            <div class="course-box-top-box-2 space-mono-thin"><?php echo $row['courseName'] ?></div>
                            <h5 class="open-sans-regular"><?php echo $row['courseName'] ?></h3>
                                <span class="open-sans-regular"><?php echo $row['courseDescription'] ?></span>
                                <div class="course-container-footer open-sans-bold"><u>view course</u></div>
                            </div>
                        </div>
                            <?php
                                }
                            } else {
                            ?>
                            <div class ="empty-box" style="color: gray;"><i class="fa-solid fa-ban" style="margin-top:35%; margin-bottom:15%; font-size:90px"></i><p>No Course Available</p></div>
                            <?php
                            }
                            ?>
                    </div>
                    <div id="specialCoursesSection">
                        <h4>Special Courses You can Enroll</h4>
                        <hr style="border-width: 1px; border-color: black;">
                        <div class="course-container-main-box-act">
                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Web Development</div>
                                        <h5 class="open-sans-regular">Learn HTML</h5>
                                        <span class="open-sans-regular">Learn HTML to kickstart your front-end career and embark on an exciting journey into web development. Mastering HTML is the first step towards crafting captivating websites and user interfaces that captivate audiences worldwide. </span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>
                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Machine Learning</div>
                                        <h5 class="open-sans-regular">Learn Python</h5>
                                        <span class="open-sans-regular">Learn Python to dive into the world of programming and open up a realm of possibilities in software development. Mastering Python is like unlocking a toolkit that allows you to build powerful applications, automate tasks, analyze data, and much more.</span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>
                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Web Development</div>
                                        <h5 class="open-sans-regular">Learn JavaScript</h5>
                                        <span class="open-sans-regular">Explore JavaScript to delve into the realm of programming and unleash a world of possibilities in software development. Mastering JavaScript is akin to acquiring a versatile toolset that empowers you to create dynamic web applications, handle user interactions, manipulate data, and more.</span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                        </div>
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



    // PARA NI SA COURSE BOSS
if (isset($_POST['addCourse'])) {
    if($userType == "teacher") {
 
         //for tblcourse
         $CourseName = $_POST['courseName'];
         $CourseDescription = $_POST['courseDescription'];
         
         //fetch usertype
         $userId = $_SESSION['acctid']; 
         $query = "SELECT usertype FROM tbluseraccount WHERE acctid = $userId";
         $result = mysqli_query($connection, $query);
         $row = mysqli_fetch_assoc($result);
         $userType = $row['usertype'];
 
         //insert data into table course
         $sqlCourse = "INSERT INTO tblcourse(courseName, courseDescription) VALUES ('$CourseName', '$CourseDescription')";
         mysqli_query($connection, $sqlCourse);
 
         //retrieve teacherID
         $query2 = "SELECT teacherID FROM tblteacherrecord WHERE acctid_fk_teacherrecord = $userId";
         $result2 = mysqli_query($connection, $query2);
         $row2 = mysqli_fetch_assoc($result2);
         $studID = $row2['teacherID'];
 
         //retrieve the created courseID
         $query3 = "SELECT courseID FROM tblcourse WHERE courseName = '$CourseName'";
         $result3 = mysqli_query($connection, $query3);
         $row3 = mysqli_fetch_assoc($result3);
         $courseID = $row3['courseID'];
 
         $sqlcourseTeacher = "INSERT INTO tblcourseteacher(courseID, teacherID) VALUES ('$courseID', '$studID')";
         mysqli_query($connection, $sqlcourseTeacher);
         }
   
     echo "<script language='javascript'>
                           alert('New Course Created.');
                     </script>";
 }


?>