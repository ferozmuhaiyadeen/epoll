<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Login Page</title>
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


 
 if(isset($_COOKIE['ID_my_site']))


 

 { 
 	$username = $_COOKIE['ID_my_site']; 

 	$pass = $_COOKIE['Key_my_site'];

 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

 	while($info = mysql_fetch_array( $check )) 	

 		{

 		if ($pass != $info['password']) 

 			{

 			 			}

 		else

 			{

 			header("Location: index.php");



 			}

 		}

 }


 

 if (isset($_POST['submit'])) { 


 
 	if(!$_POST['username'] | !$_POST['pass']) {

 		die('You did not fill in a required field.');

 	}

 	


 	

 	$check = mysqli_query($con,"SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());



 

 $check2 = mysqli_num_rows($check);

 if ($check2 == 0) {

 		die('<h1>That user does not exist in our database. <a href=register.php>Click Here to Register</a></h1>');

 				}

 while($info = mysqli_fetch_array( $check )) 	

 {

 $_POST['pass'] = stripslashes($_POST['pass']);

 	$info['password'] = stripslashes($info['password']);

 	$_POST['pass'] = md5($_POST['pass']);



 

 	if ($_POST['pass'] != $info['password']) {

 		die('Incorrect password, please try again.');

 	}
else 

 { 

 
  

 	 $_POST['username'] = stripslashes($_POST['username']); 

 	 $hour = time() + 3600; 

 setcookie(ID_my_site, $_POST['username'], $hour); 

 setcookie(Key_my_site, $_POST['pass'], $hour);	 

 

  

 header("Location: index.php"); 

 } 

 } 

 } 

 else 

{	 

 

  

 ?> 

	
		<div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1>Login</h1>
					
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF']?>" id="myform" class="fs-form fs-form-full" autocomplete="off" method="post"> 
					<ol class="fs-fields">
						<li>
							<label class="fs-field-label fs-anim-upper" for="q1">What's your username?</label>
							<input class="fs-anim-lower" id="username" name="username" type="text" placeholder="enter username" required/>
						</li>
						<li>
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="Your password will be safe with us...">What's your password?</label>
							<input class="fs-anim-lower" id="pass" name="pass" type="password" placeholder="enter password" required/>
						</li>
						
					</ol><
					<button class="fs-submit" name="submit" type="submit" value="Login">login</button>
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
