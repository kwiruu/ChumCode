<html lang="en">

<head>
  <script src="js/styles.js" defer></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:wght@300;400;500;600;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Space+Mono:wght@400;700&family=UnifrakturMaguntia&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <title>ChumCode</title>
</head>

<header>
  <nav class="open-sans-regular navbox">
    <div>
      <a href="index.php" class="space-mono-bold">ChumCode</a>
      <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo'<a href="myhome.php">My Home</a>';
        }
      ?>
      <a href="catalog.php">Catalog</a>
      <a href="">Resources</a>
      <a href="">Problems</a>
      <a href="dashboard.php">Dashboard</a>
      <?php
        if (isset($_SESSION['username'])) {
            echo' <a href="activity.php">Activity</a>
                  <a href="assignactivity.php">Assign Activity</a>';
        }
      ?>
    </div>  
    <div style="padding-top:10px">
      <i class="fa-solid fa-magnifying-glass left"></i>
      <?php
        $con = mysqli_connect("localhost", "root", "", "dbcabilif1") or die("Error in connection");

        // Check if the user is logged in
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            // Display username instead of "Log In" link
            echo '<a href="profile.php">' . $username . '</a>';
            echo'<a href="logout.php">Logout</a>';
        } else {
            // Display "Log In" link
            echo '<a href="login.php" class="open-sans-bold">Log In</a>';
            
        }
      ?>
  </div>
  </nav>
</header>