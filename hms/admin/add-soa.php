<?php
session_start();
// error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$number=$_POST['number'];
$item=$_POST['item'];
$cost=$_POST['cost'];
$sc=$_POST['sc'];
$total=$_POST['total'];
$or=$_POST['or'];
$swiped=$_POST['swiped'];
$soa=$_POST['soa'];
$sql= "INSERT INTO soa(soa_number,soa_items,soa_cost,soa_sc,soa_total,soa_or,soa_swiped,soa_account)
							  VALUES('$number','$item','$cost','$sc','$total','$or','$swiped','$soa')";
$put=mysqli_query($con,$sql);
if($put)
{
	echo "<script>alert('SOA Added Successfully');</script>";
	header('location:manage-soa.php');
}else{
	echo "<script>alert('There is some sort of error');</script>";
	header('location:add-soa.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Add SOA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Add SOA</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Add SOA</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="panel-body">
								<div class="text-bold">
                                    	<h5>Date:<?php echo date("F / d / Y");?></h5>
                                </div> 

								<form method="post" action="add-soa.php">
<div class="row">
	<div class="col-lg-10">
		<div class="form-group">
							<label class="text-bold">Number</label>
							<input type="text" name="number" class="form-control input-sm" autocomplete="off">                                
        </div>
	</div>
</div>
<div class="row">
    <div class="col-lg-5">
		<div class="form-group">
							<label class="text-bold">ITEMS </label>
							<textarea name="item" class="form-control input-sm" autocomplete="off"></textarea>
		</div>
	</div>
    <div class="col-lg-5">
		<div class="form-group">
							<label class="text-bold">COST</label>
							<input type="text" name="cost" class="form-control input-sm" autocomplete="off">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<div class="form-group">
							<label class="text-bold">TOTAL</label>
							<input type="text" name="total" class="form-control input-sm" autocomplete="off"></textarea>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="form-group">
							<label class="text-bold">SC</label>
							<input type="text" name="sc" class="form-control input-sm" autocomplete="off">                                
        </div>
	</div>
	<div class="col-lg-4">
		<div class="form-group">
							<label class="text-bold">OR</label>
							<input type="text" name="or" class="form-control input-sm" autocomplete="off">                                
        </div>
	</div>
</div>
<div class="row">
    <div class="col-lg-5">
		<div class="form-group">
							<label class="text-bold">SWIPED TERMINAL </label> <br />
							<input type="checkbox" name="swiped" value="1" class="checkbox-inline">1
							<input type="checkbox" name="swiped" value="2" class="checkbox-inline">2
							<input type="checkbox" name="swiped" value="3" class="checkbox-inline">3
		</div>
	</div>
    <div class="col-lg-5">
		<div class="form-group">
							<label class="text-bold">SOA ACCOUNT NAME</label>
							<input type="text" name="soa" autocomplete="off" class="form-control input-sm">
		</div>
	</div>
</div>
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								
									</form>
								</div>
							</div>
						</div>
										</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<!-- <?php include('include/footer.php');?> -->
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
