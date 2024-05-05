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
                <?php if ($userType == "teacher") { ?>
                <button id="assignactivitiesButton" class="toggle-button"><i class="fa-regular fa-pen-to-square" style="margin-right:5%;"></i> Assign Activities</button>
                <?php } ?>                
                <button id="workspacesButton" class="toggle-button"><i class="fa-solid fa-code" style="margin-right:5%;"></i> Workspaces</button>
            </div>
            <div class="dashboard-right-panel">
                <div id="coursePage" class="page">
                    <div>
                        <div style="display:flex; justify-content:space-between; width:100%;">
                            <h4>Courses</h4>
                            <?php if ($userType == "teacher") { ?>
                        <button type="button" class="addCourse-button" onclick="openAddActivityPopup()"> Add Course <i class="fa-solid fa-plus"></i></button><br>
                    <?php } ?>
                        </div>  
                    <hr style="border-width: 1px; border-color: black;">
                    <!--show add button if teacher ang user -->
                    
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
                                $sql = "SELECT * FROM tblcourse WHERE courseID IN (SELECT courseID FROM tblcourseteacher WHERE fk_teacherID = (SELECT teacherID FROM tblteacherrecord WHERE acctid_fk_teacherrecord = $userId))";
                            } else if($userType == "student"){
                                $sql = "SELECT * FROM tblcourse WHERE courseID IN (SELECT courseID FROM tblcourseStudent WHERE studentID = (SELECT studentID FROM tblstudentrecord WHERE acctid_fk_studentrecord = $userId))";
                            }
                            
                            $result = mysqli_query($connection, $sql);
                        ?>
                        <?php   
                        if(mysqli_num_rows($result) > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $courseID = $row['courseID']; // Assuming you have a unique identifier for each course
                        ?>
                        <div class="course-drop-down-container" style="margin-bottom:2%">
                            <div class="drop-down-box">
                                <div>
                                    <div class="course-drop-down">
                                        <div class="course-drop-down-left">
                                            <div style="padding:3% 3%; height:100px">
                                                <p class="space-mono-thin" style="color: black; margin-bottom:5px"><?php echo $row['courseName'] ?></p>
                                                <h2 class="open-sans-bold" style="color: black; font-size:22px"><?php echo $row['courseDescription'] ?></h2>
                                            </div>
                                        </div>
                                        <div class="course-drop-down-right">
                                            <button class="toggleButton-drop-down" data-course-id="<?php echo $courseID; ?>"><i class="fa-solid fa-chevron-down"></i></button>
                                        </div>
                                    </div>
                                    <div id="contentz<?php echo $courseID; ?>" class="contentz hidden-drop-down">
                                    <div class="activity-box">
                                        <div><h6 style="font-weight:700;" class="space-mono-thin">Course</h6></div>
                                        <!-- Content associated with each course -->
                                        <?php
                                        $sqlz = "SELECT * FROM tblactivityrecord WHERE fk_courseID = $courseID";
                                        $resultz = mysqli_query($connection, $sqlz);
                                        ?>
                                        <?php
                                        while ($rowzz = $resultz->fetch_assoc()) {
                                        ?>      
                                                    <div class="activity-hover" style="display:flex; margin:1% 2%; padding:1%;font-size:14px">
                                                        <div style="margin:0%;font-weight:500;width:15%" >
                                                            Activity
                                                        </div>
                                                        <div style="width:85%; font-weight:400" class="limited-characters">
                                                        <?php echo $rowzz['activityName'] ?>
                                                        </div>
                                                    </div>
                                        <?php
                                        }
                                        ?>
                                        
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                        ?>
<div class="empty-box" style="color: gray;"><i class="fa-solid fa-ban" style="margin-top:35%; margin-bottom:15%; font-size:90px"></i><p>No Course Available</p></div>
<?php
}
?>


                    </div>
                    <div id="specialCoursesSection">
                        <h4>Special Courses You can Enroll</h4>
                        <hr style="border-width: 1px; border-color: black;">
                        <div class="course-container-main-box-act">
                                <div class="course-container-act" onclick="addSpecialCourse(this)">
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
                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Data Analysis</div>
                                        <h5 class="open-sans-regular">Learn MySQL</h5>
                                        <span class="open-sans-regular">MySQL is an open-source relational database management system. Its name is a combination of "My", the name of co-founder Michael Widenius's daughter My, and "SQL", the acronym for Structured Query Language.</span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>
                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Machine Learning Basics</div>
                                        <h5 class="open-sans-regular">Introduction to Machine Learning</h5>
                                        <span class="open-sans-regular">Explore the fundamentals of machine learning, including supervised and unsupervised learning, classification, and regression.</span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>

                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Web Development</div>
                                        <h5 class="open-sans-regular" >Frontend Development with HTML, CSS, and JavaScript</h5>
                                        <span class="open-sans-regular">Learn the building blocks of web development, including HTML for structure, CSS for styling, and JavaScript for interactivity.</span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>

                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Cybersecurity</div>
                                        <h5 class="open-sans-regular">Ethical Hacking and Penetration Testing</h5>
                                        <span class="open-sans-regular">Discover the principles and techniques of ethical hacking and penetration testing to strengthen cybersecurity defenses.</span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>
                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Python Programming</div>
                                        <h5 class="open-sans-regular">Master Python Basics</h5>
                                        <span class="open-sans-regular">Get started with Python programming language, covering basic syntax, data types, and control structures.</span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>

                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Artificial Intelligence</div>
                                        <h5 class="open-sans-regular">Introduction to AI and Neural Networks</h5>
                                        <span class="open-sans-regular">Learn the fundamentals of artificial intelligence and neural networks, including perceptrons, activation functions, and backpropagation.</span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>

                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Mobile App Development</div>
                                        <h5 class="open-sans-regular">Building iOS Apps with Swift</h5>
                                        <span class="open-sans-regular">Discover the essentials of iOS app development using Swift programming language, including UIKit, AutoLayout, and CoreData.</span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>

                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Data Science</div>
                                        <h5 class="open-sans-regular">Data Visualization with Python</h5>
                                        <span class="open-sans-regular">Learn how to create effective visualizations of data using Python libraries such as Matplotlib and Seaborn.</span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>

                                <div class="course-container-act">
                                    <div class="course-box-2">
                                        <div class="course-box-top-box-2 space-mono-thin">Blockchain Technology</div>
                                        <h5 class="open-sans-regular">Understanding Cryptocurrencies and Blockchain</h5>
                                        <span class="open-sans-regular">Explore the principles behind cryptocurrencies and blockchain technology, including decentralized ledgers and smart contracts.</span>
                                        <div class="course-container-footer open-sans-bold"><i class="fa-solid fa-chart-simple"></i> <u>view course</u></div>
                                    </div>
                                </div>

                        
                        </div>
                        <form id="addSpecialCourseForm" method="POST">
                            <input type="hidden" id="specialCourseName" name="specialCourseName">
                            <input type="hidden" id="specialCourseDescp" name="specialCourseDescp">
                        </form>
                    </div>
                    
                        </div>
                </div>

                <div id="activitiesPage" class="page" style="display: none;">
                    Activities Page Content
                </div>
                <?php if ($userType == "teacher") { ?>
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
                                        <select class="textbox-form" name="course" required>
                                            <?php
                                               
                                               $courseQuery = "SELECT *, courseName FROM tblcourse WHERE courseID IN (SELECT courseID FROM tblcourseteacher WHERE fk_teacherID = (SELECT teacherID FROM tblteacherrecord WHERE acctid_fk_teacherrecord = $userId))";

                                                $courseResult = mysqli_query($connection, $courseQuery);
                                                // Populate dropdown options with courses
                                                while ($courseRow = mysqli_fetch_assoc($courseResult)) {
                                                    echo "<option value='" . $courseRow['courseID'] . "'>" . $courseRow['courseName'] . "</option>";
                                                }
                                            ?>
                                        </select><br>
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
                <?php } ?> 

                <div id="workspacesPage" class="page" style="display: none;">
                    <h4 style="font-weight:700;">My Workspaces</h4>
                    <div class="header-box-tab">
                        <button class="tab-button active">main.c</button>
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
  //for tblactivityrecord

  $teacherIDact = $_SESSION['teacherID'];
  $Aname = $_POST['actName'];
  $Ddate = $_POST['dueDate'];

  $Ades = $_POST['actDes'];
  $courseID = $_POST['course'];

  $sqlAct = "Insert into tblactivityrecord(activityname,activitydescription,duedate,fk_courseID,fk_teacherID) values('" . $Aname . "','" . $Ades . "','" . $Ddate . "','" . $courseID . "' ,'" . $teacherIDact . "')";

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
         $teachID = $row2['teacherID'];
 
         //retrieve the created courseID
         $query3 = "SELECT courseID FROM tblcourse WHERE courseName = '$CourseName'";
         $result3 = mysqli_query($connection, $query3);
         $row3 = mysqli_fetch_assoc($result3);
         $courseID = $row3['courseID'];
 
         //insert to tblcourseteacher
         $sqlcourseTeacher = "INSERT INTO tblcourseteacher(fk_teacherID, fk_courseID) VALUES ('$teachID', '$courseID')";
         mysqli_query($connection, $sqlcourseTeacher);
         }
   
     echo "<script language='javascript'>
                           alert('New Course Created.');
                     </script>";
 }
?>

<?php
if (isset($_POST['specialCourseName']) && isset($_POST['specialCourseDescp'])) {
    $specialCourseName = $_POST['specialCourseName'];
    $specialCourseDescp = $_POST['specialCourseDescp'];

    // Insert special course into tblcourse
    $sqlInsertSpecialCourse = "INSERT INTO tblcourse(courseName, courseDescription) VALUES ('$specialCourseName', '$specialCourseDescp')";

    // Execute the SQL query
    if (mysqli_query($connection, $sqlInsertSpecialCourse)) {
        echo 'Special course added successfully!';
    } else {
        echo 'Error: Unable to add special course.';
    }
}
?>

