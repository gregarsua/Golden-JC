<?php
session_start();
include('include/config.php');
include('include/checklogin.php');
if(isset($_POST['submit']))
{
$productname=$_POST['productname'];
$name=$_POST['name'];
$number=$_POST['number'];
$details=$_POST['details'];
$count=$_POST['count'];
$cost=$_POST['cost'];
$fee=$_POST['fee'];
$collectable=$_POST['collectable'];
$total=$_POST['total'];
$collected=$_POST['collected'];
$soa=$_POST['soa'];
$swipedterminal=$_POST['terminal'];
$sql= "INSERT INTO reports(product_name,admin_name,numbers,details,counts,cost,fee,collectable,swipedterminal,report_date,soa_account,collected)
		VALUES('$productname','$name','$number','$details','$count','$cost','$fee','$collectable','$swipedterminal',now(),'$soa','$collected')";
$update=mysqli_query($con,$sql);
if($update){
	echo "<script>alert('Report Added Successfully');</script>";
	header('location:add-report.php');
	}else{
	echo "<script>alert('There is some sort of error');</script>";
	header('location:add-report.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Add Report</title>
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
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1>Staff|Add Report</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Staff</span>
									</li>
									<li class="active">
										<span>Add Report</span>
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
												<h4>Branch: <?php echo "AYALA";?>
												<h5>Date: <?php echo date("F d, Y");?></h5>
									</div>
<?php
$sql="SELECT * FROM staff where username='".$_SESSION['dlogin']."'";
$CON = mysqli_query($con,$sql);
while($data=mysqli_fetch_array($CON))
{
?>

<form action="add-report.php" method="post">

		<table class="table" id="productTable">
				<thead>
			  		<tr>			  			
			  			<th>Admin Name</th>
			  			<th>#</th>
			  			<th>Product Name</th>	
			  			<th>Details</th>			  			
			  			<th>Count</th>
						<th>Cost</th>
						<th>Fee</th>
						<th>Collectable</th>
						<th>Total</th>
			  		</tr>
			  	</thead>
				<tbody>
			<?php
			$arrayNumber = 0;
				for($x = 1; $x < 2; $x++) { ?>
					<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">
						<td>
							<div class="form-group">
								<input type="text" name="name" class="form-control input-sm" autocomplete="off" id="name<?php echo $x;?>" value="<?php echo htmlentities($data['username']);?>" readonly>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" name="number" style="width:50px;" autocomplete="off" class="form-control input-sm" value="" id="#<?php echo $x;?>" required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<select class="form-control" style="width:169px;" id="productname<?php echo $x;?>" name="productname">
									<option value="">--SELECT--</option>
									<?php $ret="SELECT * FROM products";
									$con = mysqli_query($con,$ret);
									while($row=mysqli_fetch_array($con))
									{
									?>
									<option name="productname"><?php echo htmlentities($row['product_name']);?></option>
									<?php } ?>
								</select>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" name="details" class="form-control input-sm" autocomplete="off" value="" id="details<?php echo $x;?>" required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" name="count" class="form-control input-sm" autocomplete="off" value="" id="count<?php echo $x;?>" required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" name="cost" class="form-control input-sm" autocomplete="off" value="" id="cost<?php echo $x;?>" required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" name="fee" class="form-control input-sm" autocomplete="off" value="" id="fee<?php echo $x;?>" required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" name="collectable" class="form-control input-sm" autocomplete="off" value="" id="collectable<?php echo $x;?>" required>
							</div>
						</td>
						<td>
							<div class="form-group">
								<input type="text" name="total" class="form-control input-sm" autocomplete="off" id="total<?php echo $x;?>">
							</div>
						</td>
						<td>	
						</td>
					</tr>
					<?php
						$arrayNumber++;
						}
			  		?>
				</tbody>
		</table>
<?php } ?>		
<div class="col-lg-4">
					<div class="form-group">
							<label>Collected</label><BR />
							<input type="checkbox" name="collected" value="BDO" class="checkbox-inline">BDO
							<input type="checkbox" name="collected" value="CHECK" class="checkbox-inline">CHECK
							<input type="checkbox" name="collected" value="CASH" class="checkbox-inline">CASH
					</div>
</div>
<div class="col-lg-4">
					<div class="form-group">
							<label>SOA Account</label>
							<input type="text" name="soa" class="form-control input-sm">
					</div>
</div>
<div class="col-lg-4">
					<div class="form-group">
							<label>SWIPED TERMINAL</label><br />
							<input type="checkbox" name="terminal" value="1" class="checkbox-inline">1
							<input type="checkbox" name="terminal" value="2" class="checkbox-inline">2
							<input type="checkbox" name="terminal" value="3" class="checkbox-inline">3
					</div>
</div>
<div class="col-lg-5">
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary">Add</button>
					</div>
</div>	
</form>	
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
		<script src="assets/js/add-report.js"></script>
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