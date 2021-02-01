<?php
session_start();
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$to=$_POST['to'];
$from=$_POST['from'];
$items=$_POST['items'];
$cost=$_POST['cost'];
$collected=$_POST['collected'];
$sql="INSERT INTO acknowledgements(receiver,issuer,items,cost,collected,date)
							VALUES('$to','$from','$items','$cost','$collected',now())";
$put = mysqli_query($con,$sql);
if($put)
{
echo "<script>alert('Acknowledgement Added Successfully');</script>";
	header('location:manage-acknowledgement.php');
}else{
echo "<script>alert('There is some sort of error');</script>";
	header('location:add-acknowledgement.php');
}
 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Acknowledgements</title>
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
									<h1 class="mainTitle">Admin | Acknowledgements</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Acknowledgements</span>
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
                                    	<h5>Date:<?php echo date("F d, Y");?></h5>
                                </div>          
    
<form method="post" action="add-acknowledgement.php">
<div class="row">
	<div class="col-lg-5">
		<div class="form-group">
							<label class="text-bold">TO</label>
							<input type="text" name="to" class="form-control input-sm" autocomplete="off">                        
        </div>

	</div>
	<div class="col-lg-5">
		<div class="form-group">
							<label class="text-bold">FROM</label>
							<input type="text" name="from" class="form-control input-sm" autocomplete="off">
		</div>
	</div>
</div>
<div class="row">
    <div class="col-lg-5">
		<div class="form-group">
							<label class="text-bold">ITEMS </label>
							<textarea name="items" class="form-control input-sm" autocomplete="off"></textarea>
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
    <div class="col-lg-5">
		<div class="form-group">
							<label class="text-bold">COLLECTED </label> <br />
							<input type="checkbox" name="collected" value="BDO" class="checkbox-inline">BDO
							<input type="checkbox" name="collected" value="CHECK" class="checkbox-inline">CHECK
							<input type="checkbox" name="collected" value="CASH" class="checkbox-inline">CASH
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
