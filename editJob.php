<?php
 $db = mysqli_connect("localhost", "root", "", "talent-tide");


 if(isset($_GET['ab'])){

 	$edit_id = $_GET['ab'];

 	$get_edit = "select * from addjob where job_id = '$edit_id'";

 	$run_edit = mysqli_query($db, $get_edit);
 	$row_edit = mysqli_fetch_array($run_edit);

 	  $id =$row_edit['job_id'];
 	$job_name = $row_edit['job_name'];	
 	$com_name =	$row_edit['com_name'];
 	$job_des =	$row_edit['job_des'];
 	$sal 		=		$row_edit['sal'];
 	$exp_req =	$row_edit['exp_req'];

 }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Jobs</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;

		}
	html,body{
		width: 100%;
		height: 100%;
		background-color: rgb(243, 230, 216);
		
	}
	#jb-input{
		width: 100%;
		height: 60%;
		margin-top: 50px;
	}
	form{
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	form input{
		width: 30%;
		border:none;
		height: 30px;
	}
	form label{
		font-size: 24px;
		font-weight: 500;
		width: 30%;
		border: 1px solid #635f5f;
		border-radius: 2%;
		font-size: 20px;
		font-weight: 600;
		padding-top: 2px;
	}
	#pst-btn{
		display: flex;
		justify-content: space-around;
		padding-top: 10px;
		width: 30%;
	}
	form button{
		border: none;
		padding: 2% 7%;
		font-size:18px;
		border-radius: 6%;
		font-weight: 700;
	}
	</style>
</head>
<body>
<div id="nav">
	<nav class="navbar as" style="margin-bottom: 0px;">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><img src="img\Modern work Opportunity Platform.png" style="width:50px;height: 50px;"></li>
      <li class="active"><a class="sa" href="employer.php" >Home</a></li>
      <li><a class="sa" href="#" >Contact Us</a></li>
      <li><a class="sa" href="#" >About Us</a></li>
      <!-- drop down button -->
      <li><div class="dropdown">
    <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top: 6px; background:transparent; color:#fff; font-size:16px; font-weight:500;">Jobs
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="addJobs.php">Add Jobs</a></li>
      <li ><a href="jobs1.php">View Jobs</a></li>
    </ul>
  </div></li>
      <!-- end button -->
      <ul class="nav navbar-nav navbar-right ">
      	<li ><a href="login.php" target="_self"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
      </ul>
       </ul>
</div>
  </div>
</nav>
</div>
<div id="jb-input">
	<form method="post">
		<label>Job Name</label>
		<input type="text" name="job-name" placeholder="job name" value="<?php echo $job_name; ?>">
		<label>Company Name</label>
		<input type="text" name="com-name" placeholder="Company name" value="<?php echo $com_name; ?>">
		<label>Job Description</label>
		<input type="text" name="job-des" placeholder="job description" value="<?php echo $job_des; ?>">
		<label>Salary</label>
		<input type="text" name="sal" placeholder="salary" value="<?php echo $sal; ?>">
		<label>Experience Required</label>
		<input type="text" name="exp-req" placeholder="Experience Required" value="<?php echo $exp_req; ?>">
		<div id="pst-btn">
			<button class="btn-success" type= "submit" name="update">Update</button>
			
		</div>
	</form>
</div>
</body>
</html>

<?php

	if(isset($_POST['update'])){
	
		$job_name = $_POST['job-name'];
		$com_name = $_POST['com-name'];
		$job_des = $_POST['job-des'];
		$sal = $_POST['sal'];
		$exp_req = $_POST['exp-req'];

		$update = "update addjob set job_name='$job_name' ,com_name='$com_name' ,job_des='$job_des', sal='$sal', exp_req='$exp_req' where job_id='$edit_id'";

		$run_update = mysqli_query($db, $update);

		if($update){

			echo"<script>alert('Update successfully');</script>";
			echo"<script>window.location.href='jobs1.php';</script>";

		}

	}

?>

