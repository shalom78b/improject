<?php
session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>

<HTML>
<HEAD>
<TITLE>Welcome</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .tabcontent {
            display: none;
        }
        .locontent{
            background-color: gray;
        }
    </style>
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="page-header">
			<span class="login-signup"><a href="logout.php">Logout</a></span>
		</div>
		<div class="page-content"><h2>Welcome to facebook, connect with friends and the world</h2><br><br></div> 
	
    <div>
   <?php
        // Database connection parameters
     $servername = "localhost";
     $username = "root";
     $password = "Shalom78g!";
     $dbname = "insta";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);

     // Check connection
     if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
     }
     // Retrieve user data from the database
     $sql = "SELECT * FROM user";
     $result = $conn->query($sql);

     // Check if there are any users
     if ($result->num_rows > 0) {
     //echo "<h2>Welcome, " . $_SESSION["email"] . "!</h2>";
     echo "<h3>User List:</h3>";
     echo "<ul>";

     // Display each user
     while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["username"] . " - " . $row["email"] . "</li>";
     }

     echo "</ul>";
     } else {
     echo "<p>No users found.</p>";
     }
    ?>
  </div>
  <div>
  <button onclick="openJoinPage()">inner Join</button>

    <script>
        function openJoinPage() {
            // Open a new tab or window
            var newTab = window.open('innerjoin.php', '_blank');
        }
    </script>
  </div><br>
  <div>
  <button onclick="openJoinPage()">left outer join</button>

   <script>
    function openJoinPage() {
        // Open a new tab or window
        var newTab = window.open('outerjoin.php', '_blank');
    }
  </script>
  </div><br>
  <div>
  <button onclick="openJoinPage()">right outer join</button>

  <script>
    function openJoinPage() {
        // Open a new tab or window
        var newTab = window.open('rightouterjoin.php', '_blank');
    }
 </script>
 </div><br>
 <div>
 <button onclick="openJoinPage()">cross join</button>

 <script>
    function openJoinPage() {
        // Open a new tab or window
        var newTab = window.open('crossjoiin.php', '_blank');
    }
 </script>
 </div><br>
 <div>
 <button onclick="openJoinPage()">full join</button>

 <script>
    function openJoinPage() {
        // Open a new tab or window
        var newTab = window.open('fulljoin.php', '_blank');
    }
 </script>
 </div>
</BODY>
</HTML>
