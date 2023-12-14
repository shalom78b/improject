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
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="page-header">
			<span class="login-signup"><a href="logout.php">Logout</a></span>
		</div>
		<div class="page-content">Welcome to facebook, connect with friends and the world<?php echo $username;?><br><br>
          <h1>facebook is a place for interraction</h1>
          <h2>users</h2>
    
        </div>
	</div>
    <div>
    <?php 
    public function getMember($username)
    {
        $query = 'SELECT * FROM user';
        $paramType = 's';
        $paramValue = array(
            $username
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    } 
    ?>
    </div>
</BODY>
</HTML>
