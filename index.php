<?php 
$title = "Register";
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
    <main class="AppMain">
			<main class="registerForm">
        <header class="topHeader">
          <img src="./icon/register.svg" alt="LoginIcon">
          <h2>Register</h2>
        </header>
				<form class="form" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
          <div class="error-box">
            <img src="./icon/errorIcon.svg" alt="errorIcon">
            <p class="error-text"></p>
          </div>
          <div class="inputs">
          <div class="nameInputs">
            <input 
            name="fname" 
            type="text" 
            placeholder="First name *" 
            required>
            <input 
            class="notRequiredInputs"
            name="lname" 
            type="text" 
            placeholder="Last name" >
          </div>
						<input  
            name="email" 
            type="text" 
            placeholder="Email *" 
            autocomplete="Email" 
            required />
            <div class="passwordInput">
              <input
              name="password"
							type="password"
							placeholder="Password *"
							autocomplete="current-password"
							required
              />
              <i class="fas fa-eye">show</i>
            </div>
            <p></p>
            <input 
            class="notRequiredInputs"
            name="image" 
            type="file" 
            accept="image/x-png,image/gif,image/jpeg,image/jpg">
						<input 
            name="submit" 
            type="submit" 
            class="registerBtn" 
            value="Register" />
					</div>
					<div class="links">
						<div class="line"></div>
						<a href="login.php">Login</a>
					</div>
				</form>
			</main>
		</main>

  <script src="javascriptFiles/pass-show-hide.js"></script>
  <script src="javascriptFiles/signup.js"></script>

</body>
</html>
