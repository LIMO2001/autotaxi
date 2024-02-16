
<!DOCTYPE HTML>
<html>

<head>
	<title>Auto/Taxi Stand Management System | Home Page</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="css/slider.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/camera.min.js"></script>
	<script type="text/javascript">
		jQuery(function () {
			jQuery('#camera_wrap_1').camera({
				height: '500px',
				pagination: false,
			});
		});
	</script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1200);
			});
		});
	</script>
</head>

<body>
	<!---strat-wrap----->

	<!---strat-header----->
	<div class="header" id="top">
		<div class="wrap">
			<!---start-logo---->
			<div class="logo">
				<h3 style="color: yellow;">Auto/Taxi Stand Management System</h3>
			</div>
			<!---End-logo---->
			<!---start-top-nav---->
			<div class="top-nav">
				<ul>
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="search.php" target="_blank">Check Stand Receipt</a></li>
					<li><a href="admin/index.php">Admin</a></li>
					
					<div class="clear"> </div>
				</ul>
			</div>
			<div class="clear"> </div>
			<!---End-top-nav---->
		</div>
	</div>
	<!---End-header----->
	<!--start-image-slider---->
	<div class="slider">
		<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
			<div data-src="images/slider3.jpg"> </div>
			<div data-src="images/slider2.jpg"> </div>
			<div data-src="images/slider1.jpg"> </div>
			<div data-src="images/slider2.jpg"> </div>
		</div>
		<div class="clear"> </div>
	</div>
	<!--End-image-slider---->
	<!---start-contnet---->
	<div class="content">
		<div class="bottom-grids">
			<div class="wrap">
				<div class="copy-right">
					<p>Auto/Taxi Stand Management System | Design by <a href="https://phpgurukul.com/">PHPGurukul</a></p>
				</div>
				
			</div>
		</div>
	</div>
	<!---End-contnet---->
	</div>
	<!---End-wrap----->
</body>

</html>