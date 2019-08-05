<?php
	
	session_start();
	
	if(!isset($_SESSION['userlogin'])){
		header("Location: admin.php");
	}
	
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: admin.php");
	}
	
	if (!empty($_GET['news_id'])){
		
		$newsid = $_GET['news_id'];
		
		$dbcdel = mysqli_connect("localhost", "root", "avslTgJYQLs4", "omnitool");
	
		$sqldel = "DELETE FROM news WHERE news_id = '$newsid'";
		
		$runsql = mysqli_query($dbcdel, $sqldel);
		
		mysqli_close($dbcdel);
		
	}
	
	$newsid = 0;
	$header = 0;
	$postdate = 0;
	$content = 0;
	$initials = 0;
	
	if (!empty($_POST['news_id'])){
		$newsid = $_POST['news_id'];
	}
	
	if (!empty($_POST['header'])){
		$header = $_POST['header'];
	}
	
	if (!empty($_POST['postdate'])){
		$postdate = $_POST['postdate'];
	}
	
	if (!empty($_POST['content'])){
		$content = $_POST['content'];
	}
	
	if (!empty($_POST['initials'])){
		$initials = $_POST['initials'];
	}
	
	if ($newsid && $header && $postdate && $content && $initials){
		
		$dbcup = mysqli_connect("localhost", "root", "avslTgJYQLs4", "omnitool");
		
		$sqlup = "INSERT INTO news VALUES('$newsid', '$header', '$postdate', '$content', '$initials')";
		
		$runsql = mysqli_query($dbcup, $sqlup);
		
		mysqli_close($dbcup);
		
	}
	

?>

<!DOCTYPE html>
<html>
<head>

	<title>Omni Tool - Console</title>
	
	<link rel="stylesheet" style="text/css" href="../assets/css/navigation.css">
	<link rel="stylesheet" style="text/css" href="../assets/css/footer.css">
	<link rel="stylesheet" style="text/css" href="../assets/css/global.css">
	<link rel="stylesheet" style="text/css" href="../assets/css/index.css">
	
	<script src="../assets/javascript/jquery-3.4.0.min.js"></script>
	
	<script>
	function displayEditor() {
		var x = document.getElementById("writer");
		
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}
	
	$(document).ready(function(){
		$("#newpost").click(function(){
			$("#writer").fadeToggle(300);
		});
	});
	</script>

</head>

<body>
	
	<div id="prime-container">

		<div class="backdropGradient"></div>

		<!-- Navigation bar -->
		<header id="header" class="clearfix">
		
			<a href="#"><img class="main-logo" src="../assets/images/img_placeholder.png" alt="Program Logo"></a>
			
			<div class="navbar">
				<a class="top-link biglink" href="#">Home</a>
				<a class="top-link biglink" href="../download">Download</a>
				<a class="top-link biglink" href="../about">About</a>
				
				<div class="dropdown1">
					<button class="dropbtn1">Developers</button>
				
					<div class="dropdown-content1">
						<a href="../contribute">Contribute</a>
						<a href="../documentation">Documentation</a>
					</div>
					
				</div>
				
				<div class="dropdown2">
					
					<button class="dropbtn2">Community</button>
				
					<div class="dropdown-content2">
						<a href="../news">News</a>
						<a href="../support">Support</a>
						<a href="../faq">F.A.Q</a>
					</div>
					
				</div>
				
				<a class="login-link depthButton" href="index.php?logout=true">Logout</a>
				
			</div>
			
		</header>
		<!-- Navigation bar ends here-->
		
		<!-- Main content -->
		<div class="main clearfix backdropRelative">
		
			<h1 class="content-title">Administrator</h1>
			
			<?php
				$con = mysqli_connect("localhost", "root", "avslTgJYQLs4", "omnitool");
				
				$sqlcounter = "SELECT COUNT(news_id) FROM news";
				
				$runsql = mysqli_query($con, $sqlcounter);
				
				$row = mysqli_fetch_array($runsql);
				
				$total = $row[0];
				
				echo "<h1 class=\"content-title\">Serving " . $total . " posts</h1>";
				
				mysqli_close($con);
			?>
			
			<div class="post-wrapper">
				
				<!-- Use the attribute onclick="displayEditor()" to call the old show content display -->
				<button id="newpost" class="boxShadowsPls" type="button" ><span>New Post </span></button>
				
				<div id="writer">
					<form action="index.php" method="post">
						
						<table id="fieldtable">
							
							<tr>
								<td class="l1"><label class="labeller" for="newsid">News ID</label></td>
								<td><input id="newsid" type="text" name="news_id" size="12" required></td>
							</tr>
							
							<tr>
								<td class="l1"><label class="labeller" for="headertitle">Title</label></td>
								<td><input id="headertitle" type="text" name="header" size="12" required></td>
							</tr>
							
							<tr>
								<td class="l1"><label class="labeller" for="newsdate">News Date</label></td>
								<td><input id="newsdate" type="text" name="postdate" size="12" required></td>
							</tr>
						
						</table>
						
						<label class="labeller" for="writecontent">Content</label><br>
						<textarea id="writecontent" name="content" rows="10" cols="60" required>What's on your mind?</textarea><br>
						
						<label class="labeller" for="initial">By</label><br>
						<input id="initial" type="text" name="initials" size="12" required><br><br>
						
						<div class="clearfix">
						<input id="postbutton" type="submit" value="Submit">
						<input id="postreset" type="reset" value="Reset Fields">
						</div>
						
					</form>
				</div>
				
			</div>
			
			<div id="newsfeed">
				
				<?php
				
					$dbc = mysqli_connect("localhost", "root", "avslTgJYQLs4", "omnitool");
		
					$sql = "SELECT * FROM news ORDER BY news_id DESC";
					
					$runsql = mysqli_query($dbc, $sql);
					
					$num = mysqli_num_rows($runsql);
					
					while ($row = mysqli_fetch_array($runsql)){
						echo "<div class=\"cnt\" style=\"margin-top: 50px;\">";?>
							
							<a class ="common-link borderFade" href="index.php?news_id=<?php echo $row['news_id']; ?>">Delete</a>
							
							<?php
							
							echo "<h2 style=\"margin-top: 0;\">" . $row['header'] . "<span style=\"float: right; font-size: 11pt;\">" . $row['postdate'] . "</span></h2>";
							
							echo "<p>" . $row['content'] . "</p>";
							
							echo "<br>";
							
							echo "<p> - " . $row['initials'] . "</p>";
							
						echo "</div>";
						
						
					}
					
					mysqli_close($dbc);
					
					?>
				
			</div>
			
		</div>
		<!-- End main content -->
		
		<!-- Footer -->
		<footer id="footer">
			<div class="footer-content">
					
					<div class="footer-nav-column">
						<img class="footer-logo" src="../assets/images/img_placeholder.png" alt="Company Logo">
					</div>
				
					<div class="footer-nav-column">
						<h3 class="nav-group">Explore</h3>
						<a class="footer-nav-sublink" href="../download">Download</a>
						<a class="footer-nav-sublink" href="../about">About</a>
						<a class="footer-nav-sublink" href="/">Home</a>
					</div>
				
					<div class="footer-nav-column">
						<h3 class="nav-group">Help and Support</h3>
						
						<a class="footer-nav-sublink" href="../documentation">Documentation</a>
						<a class="footer-nav-sublink" href="../support">Support</a>
						<a class="footer-nav-sublink" href="../faq">F.A.Q</a>
					</div>
					
					<div class="footer-nav-column">
						<h3 class="nav-group">Resources</h3>
						
						<a class="footer-nav-sublink" href="../contribute">Contribute</a>
						<a class="footer-nav-sublink" href="../news">News</a>
					</div>
				
			</div>
			
			<p id="footer-copyright"><span class="copyright-gray">&#169;</span> Omni Tool <span class="copyright-gray">2019</span></p>
				
		</footer>
		<!-- Footer ends here -->

	</div>


</body>
</html>