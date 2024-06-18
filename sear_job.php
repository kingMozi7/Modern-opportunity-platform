<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Your CSS styles */
*{
    margin:0;
    padding: 0;
    box-sizing: border-box;
}
html,body{
    width: 100%;
    height: 100%;
    background-color: rgb(243, 230, 216);
}
#part1{
    width: 100%;
    height: 15%;
     
}
#carousel{
    width: 100%;
    height: 100%;
}
#part2{
    width: 100%;
    height: 100%;
     
}

        nav{
    width: 100%;
    height: 70px;
    display: flex;
    justify-content: space-between;

}
ul{
list-style: none;
}
nav a{
    text-decoration: none;
    color: #fff;
}
#nav_part1{
    display: flex;
    justify-content: space-between;
    width: 50%;
    
}
#pr1_1{
    width: 20%;
    display: flex;
    justify-content: center;
    align-items: center;
}
#pr1_2{
    width: 80%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-left: 10%;
}
#nav_part2{
    display: flex;
    padding-left: 20%;
    justify-content: space-around;
    align-items: center;
    width: 50%;
    padding-left: 25%;
}

.caption{
    text-align: center;
}

    </style>
</head>
<body>

    <!--Navbar star's here  -->
    <div id="part1">
        <nav  style="background-color: rgb(77, 51, 25); display: flex;">
      <ul id="nav_part1">
        <div id="pr1_1">
          <li><img src="img\Modern work Opportunity Platform.png" style="width:50px;height: 50px;"></li>
        </div>
        
        <div id="pr1_2">
        <li ><a  href="index.php" >Home</a></li>
        <li><a  href="#" >Contact Us</a></li>
        <li><a  href="#" >About Us</a></li>
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
        <li><a href="login.php" target="_blank"><span class="glyphicon glyphicon-log-in"></span> Login</a>
        </li>
        </li>
    </ul>
    </div>
  
        <!-- end button -->

        <!-- carousel start -->
        <div id="carousel">
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

        <!-- carousel end -->




        <div id="part1">
             <?php 
        // Establish database connection
        $db = mysqli_connect("localhost", "root", "", "talent-tide");

        // Retrieve the search query parameter
        $search_query = isset($_GET['user_query']) ? $_GET['user_query'] : '';

        // Modify the SQL query to filter based on the search query
        $query = "SELECT * FROM addjob WHERE job_name LIKE '%$search_query%'";
        $result = mysqli_query($db, $query);
     ?>

    <div id="thumb">
        <?php
            // Loop through the search results
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-4">
                <div class="thumbnail">
                    <div  class="caption">
                        <!-- Display job details -->
                        <b>Title</b> <h4><?php echo $rows['job_name']; ?></h4>
                        <b>Company Name</b><h4><?php echo $rows['com_name']; ?></h4>
                        <b>Job Description</b><h4><?php echo $rows['job_des']; ?></h4>
                        <b>Salary</b><h4><?php echo $rows['sal']; ?></h4>
                        <b>Experience Required</b><h4><?php echo $rows['exp_req']; ?></h4>
                        <a class="btn btn-info" href="#">Apply</a>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
        </div>





   
</body>
</html>
