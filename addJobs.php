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
		<input type="text" name="job-name" placeholder="job name">
		<label>Company Name</label>
		<input type="text" name="com-name" placeholder="Company name">
		<label>Job Description</label>
		<input type="text" name="job-des" placeholder="job description">
		<label>Salary</label>
		<input type="text" name="sal" placeholder="salary">
		<label>Experience Required</label>
		<input type="text" name="exp-req" placeholder="Experience Required">
		<div id="pst-btn">
			<button class="btn-success" name="submit">Submit</button>
			
		</div>
	</form>
</div>
</body>
</html>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST['submit'])) {
    $jobName = $_POST["job-name"];
    $comName = $_POST["com-name"];
    $jobDes = $_POST["job-des"];
    $sal = $_POST["sal"];
    $expReq = $_POST["exp-req"];
    
    // Validate form data
    if (empty($jobName) || empty($comName) || empty($jobDes) || empty($sal) || empty($expReq)) {
        echo "<script>
              alert('Please fill in all fields');
              window.location.href='addjobs.php';
              </script>";
        exit();
    }

    // Create a database connection (replace with your actual database credentials)
    $db = mysqli_connect("localhost", "root", "", "talent-tide");

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert data into database
    $sql = "INSERT INTO addjob (job_name, com_name, job_des, sal, exp_req) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($db, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $jobName, $comName, $jobDes, $sal, $expReq);
        
        if (mysqli_stmt_execute($stmt)) {
            // Send email
            $mail = new PHPMailer(true);
            
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'johnjamesintel@gmail.com'; // replace with your Gmail email
                $mail->Password = 'knnnjaecfkckprre'; // replace with your Gmail password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                $mail->setFrom('johnjamesintel@gmail.com', 'Talent-Tide');
                $mail->addAddress('moazzanhassan717@gmail.com', 'Job-seeker');

                $mail->isHTML(true);
                $mail->Subject = 'New Job Opportunity';
                $mail->Body = 'New job posted: ' . $jobName;

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
            echo "<script>
                  alert('Successfully added job');
                  window.location.href='addjobs.php';
                  </script>";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($db);
}
?>





