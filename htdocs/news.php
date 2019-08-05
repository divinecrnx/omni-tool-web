<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" style="text/css" href="assets/css/navigation.css">
	<link rel="stylesheet" style="text/css" href="assets/css/footer.css">
	<link rel="stylesheet" style="text/css" href="assets/css/global.css">
	<link rel="stylesheet" style="text/css" href="assets/css/news.css">

	<title>Omni Tool - News</title>

</head>

<body>

	<div id="prime-container">

		<!-- Navigation bar -->
		<header id="header" class="clearfix">
		
			<a href="/"><img class="main-logo" src="assets/images/img_placeholder.png" alt="Program Logo"></a>
			
			<div class="navbar">
				<a class="top-link biglink" href="/">Home</a>
				<a class="top-link biglink" href="download">Download</a>
				<a class="top-link biglink" href="about">About</a>
				
				<div class="dropdown1">
					<button class="dropbtn1">Developers</button>
				
					<div class="dropdown-content1">
						<a href="contribute">Contribute</a>
						<a href="documentation">Documentation</a>
					</div>
					
				</div>
				
				<div class="dropdown2">
					
					<button class="dropbtn2">Community</button>
				
					<div class="dropdown-content2">
						<a href="news">News</a>
						<a href="support">Support</a>
						<a href="faq">F.A.Q</a>
					</div>
					
				</div>
				
			</div>
			
		</header>
		<!-- Navigation bar ends here-->

		<!-- Main content -->
		<div class="main clearfix">
			<div class="main-content">
				
				<h1 class="content-title">Latest News</h1>
				
				<?php
				
					$dbc = mysqli_connect("localhost", "root", "avslTgJYQLs4", "omnitool");
		
					$sql = "SELECT * FROM news ORDER BY news_id DESC";
					
					$runsql = mysqli_query($dbc, $sql);
					
					$num = mysqli_num_rows($runsql);
					
					while ($row = mysqli_fetch_array($runsql)){
						echo "<div class=\"cnt newsspace\">";
							
							echo "<h2 style=\"margin-top: 0;\">" . $row['header'] . "<span class=\"newsdate\">" . $row['postdate'] . "</span></h2>";
							
							echo "<p>" . $row['content'] . "</p>";
							
							echo "<br>";
							
							echo "<p> - " . $row['initials'] . "</p>";
							
						echo "</div>";
					}
					
					mysqli_close($dbc);
				
				?>
				
			</div>

			
			<!--<aside class="aside">
				<p>Some side content</p>
			</aside>-->
		</div>
		<!-- End main content -->
		
		<!-- Footer -->
		<footer id="footer">
			<div class="footer-content">
					
					<div class="footer-nav-column">
						<img class="footer-logo" src="assets/images/img_placeholder.png" alt="Company Logo">
					</div>
				
					<div class="footer-nav-column">
						<h3 class="nav-group">Explore</h3>
						<a class="footer-nav-sublink" href="download">Download</a>
						<a class="footer-nav-sublink" href="about">About</a>
						<a class="footer-nav-sublink" href="/">Home</a>
					</div>
				
					<div class="footer-nav-column">
						<h3 class="nav-group">Help and Support</h3>
						
						<a class="footer-nav-sublink" href="documentation">Documentation</a>
						<a class="footer-nav-sublink" href="support">Support</a>
						<a class="footer-nav-sublink" href="faq">F.A.Q</a>
					</div>
					
					<div class="footer-nav-column">
						<h3 class="nav-group">Resources</h3>
						
						<a class="footer-nav-sublink" href="contribute">Contribute</a>
						<a class="footer-nav-sublink" href="news">News</a>
					</div>
				
			</div>
			
			<p id="footer-copyright"><span class="copyright-gray">&#169;</span> Omni Tool <span class="copyright-gray">2019</span></p>
				
		</footer>
		<!-- Footer ends here -->
		
	</div>

</body>

</html>