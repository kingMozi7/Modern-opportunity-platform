<?php
// Start the session
session_start();

// Include the database connection
$db = mysqli_connect("localhost", "root", "", "talent-tide");

// If upload button is clicked ...
if (isset($_POST['submit'])) {
    // Get the submitted data from the form
    $name = $_POST["name"];
    $bio = $_POST["bio"];
    $mission = $_POST["mission"];
    $job = $_POST["job"];
    if ($_FILES["img"]["error"] === 4) {
        echo "<script>alert('Image Does Not Exist');</script>";
    } else {
        $fileName = $_FILES["img"]["name"];
        $fileSize = $_FILES["img"]["size"];
        $tempName = $_FILES["img"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid Image Extension');</script>";
        } else if ($fileSize > 1000000) {
            echo "<script>alert('Image Size is too large. Maximum size allowed is 1MB')</script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tempName, 'img/' . $newImageName);
            $query = "INSERT INTO emplo_prof (pic, name, bio, mission, job) VALUES ('$newImageName', '$name', '$bio', '$mission', '$job')";
            if (mysqli_query($db, $query)) {
                echo  "<script>alert('Successfully uploaded your data'); window.location.href='employer.php';</script>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($db);
            }
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>employer</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            position: relative;
            box-sizing: border-box;
        }

        #update-form {
            width: 100%;
            height: calc(100% - 50px);
            background-color: #000000a2;
            position: absolute;
            z-index: 1;
            display: none;
        }
    </style>

</head>

<body style="background-color:rgb(243, 230, 216);">
    <div id="nav">
        <nav class="navbar as" style="margin-bottom: 0px; background-color: #50352C;padding-top: 10px;">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><img src="img\Modern work Opportunity Platform.png" style="width:50px;height: 50px;"></li>
                    <li class="active"><a class="sa" href="employer.php">Home</a></li>
                    <li><a class="sa" href="#">Contact Us</a></li>
                    <li><a class="sa" href="#">About Us</a></li>
                    <!-- drop down button -->
                    <li>
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown"
                                style="margin-top: 6px; background:transparent; color:#fff; font-size:16px; font-weight:500;">
                                Jobs
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="addJobs.php">Add Jobs</a></li>
                                <li><a href="jobs1.php">View Jobs</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="add_rate_emp.php">Rate Us</a></li>
                    <!-- end button -->
                    <ul class="nav navbar-nav navbar-right ">
                        <li><a href="logout.php" target="_self"><span class="glyphicon glyphicon-log-out"></span>
                                Logout</a></li>
                    </ul>
                </ul>
            </div>
        </nav>
    </div>
    <div id="update-form">
        <!--form start--->
        <div class="container bg-info " style="height:600px; width:500px; min-height: 100%;">
            <div class="row">

                <div class="col-md-12">
                    <div
                        style="background-color: rgba(255,255 ,255 , 0.5); height:15cm ; margin-top: 22px;">
                        <form method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label>Bio</label>
                                <textarea class="form-control" name="bio"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <input class="form-control" type="file" name="img" accept=".jpg, .jpeg, .png">
                            </div>
                            <div class="form-group">
                                <label>Mission</label>
                                <textarea name="mission" class="form-control" style="height:100px"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Job Opportunities</label>
                                <textarea name="job" class="form-control" style="height:100px"></textarea>
                            </div>
                            <div id="btns" style="display: flex;">
                                <button class="btn btn-success" type="submit" style="margin-left: 23%;"
                                    name="submit">Update</button>
                                <button class="btn btn-danger" type="submit" style="margin-left: 20%;"
                                    name="close" onclick="toggleCloseForm()">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--form end-->
    <div class="container bg-info " style="height:500px">

        <div class="row" style="height:100%">

            <div class="col-md-3">
                <div
                    style="width: 100px; height: 100px; background-color: rgba(255,255 ,255 , 0.5) ; border-radius: 50%; margin-top: 10px; margin-left: 85px;  color:white">
                    <img src="img/MainAfter.jpg" alt="profile image"
                        style="width:100% ;height: 100%; border-radius: 50%;">
                </div>
                <div>
                    <p style="font-size:25px; text-align: center;">NAME </p>
                </div>
                <div>
                    <button onclick="toggleUpdateForm()" class="btn btn-danger" type="submit" style="width:100%">
                        Update Profile
                    </button>
                </div>
                <div
                    style="background-color: rgba(255,255 ,255 , 0.5); height:5cm ; width:100%; margin-top:5px; ">
                    <p style="text-align:center; font-weight: bold;"><span>Bio</span></p>
                </div>
            </div>
            <div class="col-md-9">
                <div
                    style="background-color: rgba(255,255 ,255 , 0.5); height:11.1cm ; margin-top: 10px;">
                    <form>
                        <div
                            style="border:1px solid rgba(0, 51, 200, 0.2); height: 200px; border-radius:5px;">
                            <p><span style="border-bottom: 2px solid black; margin:5px;font-size:24px ; font-weight:bold;">MISSION</span>
                            </p>
                            <p> </p>
                        </div>
                        <div
                            style="border:1px solid rgba(0, 51, 200, 0.2); height: 200px; border-radius:5px; margin-top: 20px;">
                            <p><span style="border-bottom: 2px solid black; margin:5px;font-size:24px ; font-weight:bold;">JOB
                                    OPPORTUNITIES</span></p>
                            <p> </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    var a = document.querySelector("#update-form");

    function toggleUpdateForm() {
        if (a.style.display === "block") {
            a.style.display = "none";
        } else {
            a.style.display = "block";
        }
    }

    function toggleCloseForm() {
        if (a.style.display === "none") {
            a.style.display = "block";
        } else {
            a.style.display = "none";
        }
    }
    </script>
 
</body>

</html>
