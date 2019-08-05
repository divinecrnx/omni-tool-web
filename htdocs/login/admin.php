<?php
	
	session_start();
	
	if(isset($_SESSION['userlogin'])){
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>

<head>

	<title>Omni Tool - Login</title>
	
	<link rel="stylesheet" style="text/css" href="../assets/css/navigation.css">
	<link rel="stylesheet" style="text/css" href="../assets/css/footer.css">
	<link rel="stylesheet" style="text/css" href="../assets/css/global.css">
	<link rel="stylesheet" style="text/css" href="../assets/css/login.css">

</head>

<body>

	<div id="prime-container">

	    <!-- Navigation bar -->
		<header id="header" class="clearfix">
			<a href="/"><img class="main-logo" src="../assets/images/img_placeholder.jpg" alt="Program Logo"></a>
			<div class="navbar">
				<a class="top-link biglink" href="/">Home</a>
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
				
				<a class="login-link hide-this" href="#">Login</a>
				
			</div>
		</header>
		<!-- Navigation bar ends here-->
		
		<!-- Main content -->
		<div class="main clearfix">
			
			<div id="login-wrapper">
				
				<div id="id01" class="modal">

					<form class="modal-content" action="">
						<div class="imgcontainer">
							
							<img src="../assets/images/img_placeholder.png" alt="Avatar" class="avatar">
							
						</div>

						<div class="container">
						
							<b>Username</b>
							<input id="username" type="text" placeholder="Enter Username" name="uname">

							<b>Password</b>
							<input id="password" type="password" placeholder="Enter Password" name="psw">

							<button id="loginbutton" type="submit">Login</button>
							
						</div>
					</form>
					
				</div>

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
	
	<script src="../assets/javascript/jquery-3.4.0.min.js"></script>
	<script src="../assets/javascript/popper.min.js"></script>
	<script src="../assets/javascript/bootstrap.min.js"></script>
	
	<script>
		$(function(){
			$('#loginbutton').click(function(e){
				
				var valid = this.form.checkValidity();
				
				if(valid){
					
					var username = $('#username').val();
					var password = $('#password').val();
					
				}
				
				e.preventDefault();
				
				$.ajax({
					type: 'POST',
					url: 'jslogin.php',
					data: {username: username, password: password},
					success: function(data){
						alert(data);
						if($.trim(data) === "Welcome back!"){
							setTimeout(' window.location.href = "index.php"', 1000);
						}
					},
					error: function(data){
						alert('there were errors while doing the operation.');
					}
				});
				
				
			});
		});
	</script>
	
</body>
</html>