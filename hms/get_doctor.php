<?php
include('include/config.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql= "SELECT doctorName,id FROM doctors WHERE specilization='".$_POST['specilizationid']."'";
 		$con = mysqli_query($bd,$sql);
 ?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($con))
 	{?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['doctorName']); ?></option>
  <?php
}
}


if(!empty($_POST["doctor"])) 
{

 $sql1= "SELECT docFees FROM doctors WHERE id='".$_POST['doctor']."'";
 	$con1 = mysqli_query($bd,$sql1);

 while($row=mysqli_fetch_array($con1))
 	{?>
 <option value="<?php echo htmlentities($row['docFees']); ?>"><?php echo htmlentities($row['docFees']); ?></option>
  <?php
}
}

?>

