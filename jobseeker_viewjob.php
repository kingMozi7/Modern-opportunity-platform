<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Jobs</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
        }

        body {
            background-color: rgb(243, 230, 216);
        }

        #thumb {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 1% 1%;
        }

        .thumbnail {
            flex: 0 0 30%; /* Adjust this width according to your needs */
            margin-bottom: 20px;
        }

        .thumbnail .caption {
            padding: 10px;
            background-color: #fff;
            text-transform: uppercase;
            text-align: center;
        }
        .thumbnail .caption b{
            font-size: 20px;
/*            border-bottom: 1px solid black;*/
            font-weight: 500;
        }

    </style>
</head>
<body>
    <nav class="navbar as" style="margin-bottom: 0px;">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><img src="img\Modern work Opportunity Platform.png" style="width:50px;height: 50px;"></li>
                <li class="active"><a class="sa" href="jobSeeker.php" >Home</a></li>
                <li><a class="sa" href="#" >Contact Us</a></li>
                <li><a class="sa" href="#" >About Us</a></li>
                <li><a class="sa" href="jobseeker_viewjob.php" >View Job</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php" target="_self"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
            </ul>
        </div>
    </nav>

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
            <div class="col-md-4">
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
</body>
</html>
