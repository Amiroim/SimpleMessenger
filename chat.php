<?php 
  session_start();
  include_once "php/config.php";

  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
    exit();
  }

  if(!isset($_GET['user_id']) || empty($_GET['user_id'])){
    header("location: users.php");
    exit();
  }

  $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$user_id}'");

  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
  } else {
    header("location: users.php");
    exit();
  }

  $title = $row['fname'] . " " . $row['lname'];
  $offline = ($row['status'] == "Offline now") ? "offline" : "";
?>
<?php include_once "header.php"; ?>
<body class="ChatPage AppMain">
	<header class="box">
		<a href="users.php">
			<img src="icon/back.svg" alt="backToUsers" class="icon" />
		</a>
      
		<div class="status-dot <?php echo $offline; ?>"></div>
		<div class="userInformation">
			<img src="./images/<?php echo htmlspecialchars($row['img']); ?>" alt="userProfile" />
			<div class="name_status">
				<p><?php echo htmlspecialchars($row['fname'] . " " . $row['lname']); ?></p>
				<p class="status"><?php echo htmlspecialchars($row['status']); ?></p>
			</div>
		</div>
	</header>
	<main class="box chatBox">
		<div class="chat-box">
			
		</div>
		<form action="#" class="typing-area">
			<input
				type="text"
				class="incoming_id"
				name="incoming_id"
				value="<?php echo htmlspecialchars($user_id); ?>"
				hidden
			/>
			<input
				type="text"
				name="message"
				class="input-field"
				placeholder="Type a message here..."
				autocomplete="off"
			/>
			<button>
				<img class="icon" src="./icon/search.svg" alt="searchIcon" />
			</button>
		</form>
	</main>
</body>
<script src="javascriptFiles/chat.js"></script>
</html>
