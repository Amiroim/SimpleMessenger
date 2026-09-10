<?php 
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
  $title = "Login";
?>

<?php include_once "header.php"; ?>
  <body>
    <main class="AppMain">
			<main class="loginForm">
        <header class="topHeader">
          <img src="./icon/login.svg" alt="LoginIcon">
          <h2>Login</h2>
        </header>
				<form class="form" action="#" method="POST" enctype="multipart/form-data" autocomplete="on">
          <div class="error-box">
            <img src="./icon/errorIcon.svg" alt="errorIcon">
            <p class="error-text"></p>
          </div>
					<div class="inputs">
						<input  
            name="email" 
            type="text" 
            placeholder="Email" 
            autocomplete="Email" 
            required />
            <div class="passwordInput">
              <input
              name="password"
							type="password"
							placeholder="password"
							autocomplete="current-password"
							required
              />
              <i class="fas fa-eye">show</i>
            </div>
						<input class="loginBtn" type="submit" name="submit" value="Login" />
					</div>
					<div class="links">
						<div class="line"></div>
						<a href="index.php">Register</a>
					</div>
				</form>
			</main>
		</main>
    <script src="javascriptFiles/pass-show-hide.js"></script>
    <script src="javascriptFiles/login.js"></script>
  </body>
</html>
