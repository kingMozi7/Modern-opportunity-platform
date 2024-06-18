<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Talent Tide</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: rgb(243, 230, 216);">

  
    
  
    

     <!--Navbar star's here  -->
  <div id="nav-t">
    <nav  style="background-color: rgb(77, 51, 25); display: flex;">
      <ul id="nav_part1">
        <div id="pr1_1">
          <li><img src="img\Modern work Opportunity Platform.png" style="width:50px;height: 50px;"></li>
        </div>
        
        <div id="pr1_2">
        <li ><a  href="index.php" >Home</a></li>
        <li><a  href="#" >Contact Us</a></li>
        <li><a  href="#" >About Us</a></li>
        <li><a  href="feedback.php" >Feedback</a></li>
        </div>
      </ul>

      <ul id="nav_part2">
        <!-- drop down button -->
        <li><div class="dropdown">
          <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top: 6px; background:transparent; color:#fff; font-size:16px; font-weight:500;"><span class="glyphicon glyphicon-user"></span>Sign Up
          <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="Registration.php">Employer</a></li>
              <li ><a href="registration2.php">Job Seeker</a></li>
            </ul>
        </div>
        </li>
        


        <li><a href="login.php" target="_blank"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        </li>
      </ul>
    
  </nav>

    
  </div>
  <!-- end button -->

<!-- Nav bar end here -->
      <div id="part1">
        <div id="txt">
          <h2>Find Job You Love</h2>
        </div>    
        <div id="inp-btn">
          <form method="get" action="sear_job.php">
          <input id="ib_inp1" type="text" name="user_query" placeholder="job that you want">
          <input id="ib_inp2" class="btn btn-info" type="submit" name="search" value="Search">
          </form>
        </div>
        <div id="ent-cv">
          <a href="createresume.php"><input  type="submit" class="btn-info" name="" value="Create CV"><br></a>
        </div>

      </div>

 




      <div id="part2">
      <div class="container">
  <h2>Top Employers</h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="https://images.unsplash.com/photo-1633675254053-d96c7668c3b8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8ZmFjZWJvb2t8ZW58MHx8MHx8fDA%3D" alt="Los Angeles" style="width:100%; height: 500px">
      </div>

      <div class="item">
        <img src="https://images.unsplash.com/photo-1573804633927-bfcbcd909acd?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Z29vZ2xlfGVufDB8fDB8fHww" alt="Chicago" style="width:100%; height:500px;">
      </div>
    
      <div class="item">
        <img src="https://images.unsplash.com/photo-1523474253046-8cd2748b5fd2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YW1hem9ufGVufDB8fDB8fHww" alt="New york" style="width:100%; height: 500px;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
      </div>

      


    <div id="part3">
      <div id="part3_job">
        <div id="pt3-txt">
          <h2>Jobs</h2>
        </div>
        <?php 
        $db = mysqli_connect("localhost", "root", "", "talent-tide");
        $query = "SELECT * FROM addjob";
        $result = mysqli_query($db, $query);
     ?>

    <div id="thumb">
        <?php
            $count = 0;
            while ($rows = mysqli_fetch_assoc($result)) {
                $id =$rows['job_id'];

        ?>
            <div class="col-md-6">
                <div class="thumbnail">
                    <div  class="caption">
                       <b>Title</b> <h4><?php echo $rows['job_name']; ?></h4>
                        <b>Company Name</b><h4><?php echo $rows['com_name']; ?></h4>
                        <b>Job Description</b><h4><?php echo $rows['job_des']; ?></h4>
                        <b>Salary</b><h4><?php echo $rows['sal']; ?></h4>
                        <b>Experience Required</b><h4><?php echo $rows['exp_req']; ?></h4>

                        <a class="btn btn-info" href="jobseeker_apply.php?ab=<?php echo $id ?>">Apply</a>
                    </div>
                </div>
            </div>
        <?php
                $count++;
                if ($count % 3 == 0) {
                    echo '</div>';
                }
            }
        ?>
    </div> 

      </div>
    </div>

  

<div id="part4">
   <footer class="ch container-fluid" style="height:500px">

<div class="row ci">
  <div class="col-md-4">
    <ul>
      <h3>Jobs by functinal area</h3>
      <li>Sales & Business Development Jobs</li>
      <li>Software & Web Developoment Jobs</li>
      <li>Accounts,Finance & Financial Services Jobs</li>
      <li>Clients Services & Customer Support Jobs</li>
      <li>Teachers/Education,Training & Development</li>
      <li>Jobs</li>
      
    </ul>
  </div>
  <div class="col-md-2">
    <ul>
      <h3>Jobs By City</h3>
      <li>Jobs in Lahore</li>
      <li>Jobs in Islamabad</li>
      <li>Jobs in Rawalpindi</li>
      <li>Jobs in Faisalabad</li>
      <li>Jobs in Multan</li>
      <li>Jobs in Gujranwala</li>
      
    </ul>
  </div>
  <div class="col-md-2">
    <ul>
      <h3>Jobs by Industry</h3>
      <li>Information Technology Jobs</li>
      <li>Education/Training Jobs</li>
      <li>Call Center Jobs</li>
      <li>Manufacturing Jobs</li>
      <li>Services Jobs</li>
      <li>Real Estate/Property Jobs</li>
      
    </ul>
  </div>
  <div class="col-md-2">
    <ul>
      <h3>Job Seekers</h3>
      <li>British Council Online</li>
      <li>Placement Test</li>
      <li>Top Professionals</li>
      <li>CV Writing</li>
      <li>Free CV Review</li>
      <li>Success Stories</li>
      
    </ul>
  </div>
  <div class="col-md-2">
    <ul>
      <h3>Industrial Jobs</h3>
      <li>Jobs in Saudi Arabia</li>
      <li>Jobs in Bahrain</li>
      <li>Jobs in Qatar</li>
      <li>Jobs in UAE</li>
      <li>Jobs in Malayasia</li>
      <li></li>
      
    </ul>
    <div style="display:flex;gap: 10px;border-top: 2px solid #fff;padding-top: 20px;">
      <a href="https://www.instagram.com"><img style="" width="30px" src="img/social/1.png"></a>
      <a href="https://www.twitter.com"><img width="30px" src="img/social/2.png"></a>
      <a href="https://www.facebook.com"><img width="30px" src="img/social/3.jpg"></a>
    </div>
  </div>

</div>
          
        </footer>
</div>
    

</body>
</html>
<?php

if(isset($_POST['submit'])){
  $db = mysqli_connect("localhost", "root", "", "talent-tide");

  $name = $_POST['name'];
  $email =$_POST['email'];
  $feedback = $_POST['feedback'];

  // Check if any field is empty
  if(empty($name) || empty($email) || empty($feedback)) {
    echo "<script>alert('Please fill in all fields');</script>";
  } else {
    $ins = "INSERT INTO feedback(name,email,feedback) VALUES('$name','$email','$feedback')";

    if(mysqli_query($db, $ins)) {
      echo "<script>
              alert('Feedback submitted Successfully');
              window.location.href='index.php';
            </script>";
    } else {
      echo "<script>alert('Error: " . mysqli_error($db) . "');</script>";
    }
  }
}

?>
