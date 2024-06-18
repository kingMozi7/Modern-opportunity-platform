<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jobs</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
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
	#table{
		width: 100%;
		height: 80%;
	}
	#tabl-con{
		width: 70%;
		margin-top: 5%;

	}
	.table-bordered {
    border: 1px solid #fff;
}
	.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
    border-top: 0;
    border: 1px solid #fff;
}
	.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #fff;
}
th{
	font-size: 14px;
	font-weight: 900;
}
.btn{
	font-weight: 600;
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
      	<li ><a href="login.php" target="_blank"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
      </ul>
       </ul>
</div>
  </div>
</nav>
</div>
	<div id="table"> 
	<div class="container" id="tabl-con">
  <table class="table table-bordered">
      <tr>
        <th>Id</th>
        <th>Job Name</th>
        <th>Company Name</th>
        <th>Job Description</th>
        <th>Salary</th>
        <th>Experience Required</th>
      </tr>

      <?php
      $i=0;
        $db = mysqli_connect("localhost", "root", "", "talent-tide");
        $query = "SELECT * FROM addjob";
        $result = mysqli_query($db, $query);

        while ($rows = mysqli_fetch_assoc($result)) {

          $id =$rows['job_id'];
         $name = $rows['job_name'];
          $com =$rows['com_name'];
          $des =$rows['job_des']; 
          $sal =$rows['sal']; 
          $exp =$rows['exp_req']; 

          $i++;
        ?>
      <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $name ?></td>
        <td><?php echo $com ?></td>
        <td><?php echo $des ?></td>
        <td><?php echo $sal ?></td>
        <td><?php echo $exp ?></td>
        <td><a style="color:#fff" href="editJob.php?ab=<?php echo $id ?>" ><button class="btn btn-success">Edit</button></a>
    	<a style="color:#fff" href="job1_delete.php?ab=<?php echo $id ?>" ><button class="btn btn-danger">Delete</button></a></td>
      </tr>

      <?php
        }
        ?>
  </table>
</div>
	</div>
</body>
</html>
