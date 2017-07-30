<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Register Page</title>
		<meta name="description" content="Fullscreen Form Interface: A distraction-free form concept with fancy animations" />
		<meta name="keywords" content="fullscreen form, css animations, distraction-free, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-select.css" />
		<link rel="stylesheet" type="text/css" href="css/cs-skin-boxes.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>

<?php 
 

$con=mysqli_connect("localhost", "root", "root") or die(mysql_error()); 

 mysqli_select_db($con,"poll_system") or die(mysql_error($con)); 


 
 if (isset($_POST['submit'])) { 



 

 if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] ) {

 		die('<h1>You did not complete all of the required fields<h1>');

 	}



 

 	if (!get_magic_quotes_gpc()) {

 		$_POST['username'] = addslashes($_POST['username']);

 	}

 $usercheck = $_POST['username'];

 $check = mysqli_query($con,"SELECT username FROM users WHERE username = '$usercheck'") 

or die(mysql_error());

 $check2 = mysqli_num_rows($check);



 

 if ($check2 != 0) {

 		die('<h1>Sorry, the username '.$_POST['username'].' is already in use.</h1>');

 				}


 
 	if ($_POST['pass'] != $_POST['pass2']) {

 		die('<h1>Your passwords did not match.</h1> ');

 	}



 	

 	$_POST['pass'] = md5($_POST['pass']);

 	if (!get_magic_quotes_gpc()) {

 		$_POST['pass'] = addslashes($_POST['pass']);

 		$_POST['username'] = addslashes($_POST['username']);

 			}



 
 	$insert = "INSERT INTO users (username, password)

 			VALUES ('".$_POST['username']."', '".$_POST['pass']."')";

 	$add_member = mysqli_query($con,$insert);

 	?>



 
 <h1>Registered</h1>

 <h1>Thank you, you have registered - you may now <a href="login.php">login</a>.</h1>
 <?php 
 } 

 else 
 {	
 ?>


 <div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1>Register</h1>
					
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myform" class="fs-form fs-form-full" autocomplete="off">
					<ol class="fs-fields">
						<li>
							<label class="fs-field-label fs-anim-upper" for="q1">What's your username?</label>
							<input class="fs-anim-lower" id="q1" name="username" type="text" placeholder="enter username" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="Your password will be safe with us...">What's your password?</label>
							<input class="fs-anim-lower" id="q2" name="pass" type="password" placeholder="enter password" required/>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="Re-Enter Password...">What's your password?</label>
							<input class="fs-anim-lower" id="q2" name="pass2" type="password" placeholder="confirm password" required/>
						</li>
						
					</ol>
					<button class="fs-submit" type="submit" name="submit">Register</button>
				</form>
			</div>

		

		</div>
		<script src="js/classie.js"></script>
		<script src="js/selectFx.js"></script>
		<script src="js/fullscreenForm.js"></script>
		<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.cs-placeholder').style.backgroundColor = val;
						}
					});
				} );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); 
					}
				} );
			})();
		</script>
	</body>
</html>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

 <?php

 }
 ?> 
