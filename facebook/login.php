<?php
use Phppot\Member;

if (! empty($_POST["login-btn"])) {
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
    $loginResult = $member->loginMember();
}
?>
<HTML>
<HEAD>
<TITLE>Login To facebook</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<BODY>
	<h3>login into your facebook account</h3>
	<div class="phppot-container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="user-registration.php">Sign up</a>
			</div>
			<div class="signup-align">
				<form name="login to facebook" action="" method="post"
					onsubmit="return loginValidation()">
					<div class="signup-heading">Facebook Login</div>
				<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>
				<div class="row">
						<div class="inline-block">
							<div class="form-label">
								email<span class="required error" id="email-info"></span>
							</div>
							<input class="input-box-330" type="email" name="email"
								id="email">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="login-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="login-password" id="login-password">
						</div>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="login-btn"
							id="login-btn" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function loginValidation() {
	var valid = true;
	$("#email").removeClass("error-field");
	$("#password").removeClass("error-field");

	var email = $("#email").val();
	var Password = $('#login-password').val();

	$("#email-info").html("").hide();

	if (email.trim() == "") {
		$("#email-info").html("required.").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#login-password-info").html("required.").css("color", "#ee0000").show();
		$("#login-password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</BODY>
</HTML>
