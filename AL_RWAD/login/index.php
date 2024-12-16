<?php session_start();
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>تسجيل الدخول </title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>تسجيل الدخول </title>
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'> -->
  <!-- <link rel="stylesheet" href="./style.css"> -->

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="post">
			<h1>تسجيل الدخول </h1>
			<div class="social-container">
				<a href="" class="social"><i ></i></a>
				<a href="" class="social"><i ></i></a>
				<a href="" class="social"><i ></i></a>
			</div>
			<span></span>
			<!-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span> -->
			<input type="text" placeholder="Email" name="username" />
			<input type="password" placeholder="Password" name="password"/>
			<a href="#">اذا نسيت اسم الحساب او كلمة السر تواصل مع الادارة</a>
			<button name="Signin"> تسجيل الدخول</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>مرحبا , </h1>
				<p>اهلا وسهلا بكم في موقع رواد المسنقبل</p>
				<!-- <button class="ghost" id="signUp">Sign Up</button> -->
			</div>
		</div>
	</div>
</div>
<?php 
		include "../classes/db2.php";
		
		if(isset($_POST['Signin'])){
			
			$user_input = $_POST['username'];
			$pass_input = $_POST['password'];
			$result=staticDB::selectFromTableWhereAnd("al_rwwad","accounts",["username","password","role","student_id"],"username","=",$user_input,"password","=",$pass_input);
			if ($result->num_rows > 0) {
			  while ($row=$result->fetch_assoc()){
				//$_SESSION['username'] = $user_input;
			//	echo $_SESSION['username']."heloo";
				//echo $row['student_id']."heloo";
				  if($row["username"]=="$user_input" && $row["password"]=="$pass_input"){

					$_SESSION['loggedin'] = true;
					$_SESSION['username'] = $user_input;
                  if($row["role"]=="admin"){
					header("Location:../main.php");
				  exit;
				}
				else{
					$_SESSION['loggedin'] = true;
					$_SESSION['username'] = $user_input;
					 $_SESSION['student_id'] = $row["student_id"];
					header("Location:../login_evaluation/student_details2.php");

				}
				}
				
			  }
		   
		  }
		  else {
			  echo "<p class='alert alert-danger'>user name or password not found</p>";
		  }
		}
	

		  ?>
		  

<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
