<?php 
  session_start();
  $title = "Users";
  include_once "php/config.php";

  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
    exit();
  }

  $session_id = mysqli_real_escape_string($conn, $_SESSION['unique_id']);
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$session_id}'");

  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
  } else {
    session_unset();
    session_destroy();
    header("location: login.php");
    exit();
  }
?>
<?php include_once "header.php"; ?>
<body class="UsersPage AppMain">
		<div class="top">
		<header class="box">
			<div class="userInformation">
				<img src="./images/<?php echo htmlspecialchars($row['img']); ?>" alt="userProfile" />
				<div class="name_status">
					<p><?php echo htmlspecialchars($row['fname'] . " " . $row['lname']); ?></p>
					<p class="status"><?php echo htmlspecialchars($row['status']); ?></p>
				</div>
			</div>
			<div class="logOut">
				<a href="php/logout.php?logout_id=<?php echo htmlspecialchars($row['unique_id']); ?>">
					<p>Logout</p>
					<img src="./icon/logOut.svg" alt="logoutIcon" class="icon" />
				</a>
			</div>
		</header>
		<aside class="searchBar box">
			<input type="text" placeholder="Enter name to search..." />
			<button>
				<img class="icon" src="./icon/search.svg" alt="searchIcon" />
			</button>
		</aside>

		<main class="UsersList box">
			<h2>Select an user to start chat</h2>
			<div class="users-list">
			</div>
		</main>
	</body>
  <script src="javascriptFiles/users.js"></script>
</html>
