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

        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
        }

        #form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 70%;
            background-color: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 36px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            height: 100px;
        }

        label {
            font-weight: bold;
            font-size: 18px;
            color: #555;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group > div {
            width: 48%;
        }

        .form-group label {
            margin-bottom: 5px;
        }

        .form-group input[type="file"] {
            display: none;
        }

        .form-group .custom-file-upload {
            background-color: #4caf50;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            width: 100%;
            margin-top: 10px;
            font-size: 16px;
        }

        .form-group .custom-file-upload:hover {
            background-color: #45a049;
        }

        .btn-submit {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<nav class="navbar" style="margin-bottom: 0px; background-color: #4D3319;">
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

<div id="form-container">
    <form method="post">
        <h2>Job Application</h2>
        <div class="form-group">
            <div>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
            </div>
            <div>
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div>
                <label for="jobRole">Job Role</label>
                <input type="text" id="jobRole" name="jobRole" placeholder="Job Role" required>
            </div>
        </div>
        <div>
            <label for="address">Address</label>
            <textarea id="address" name="address" placeholder="Address" required></textarea>
        </div>
        <div class="form-group">
            <div>
                <label for="cityName">City Name</label>
                <input type="text" id="cityName" name="cityName" placeholder="City Name" required>
            </div>
            <div>
                <label for="pinCode">PinCode</label>
                <input type="text" id="pinCode" name="pinCode" placeholder="PinCode" required>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="date">Date</label>
                <input type="date" id="date" name="date" placeholder="Date" required>
            </div>
            <div>
                <label for="cv">Upload Your CV</label><br>
                <input type="file" id="cv" name="cv" required>
                <label for="cv" class="custom-file-upload">Choose File</label>
            </div>
        </div>
        <input type="submit" class="btn-submit" name="submit" value="Apply Now">
    </form>
</div>

</body>
</html>


    <?php
        $db = mysqli_connect("localhost", "root", "", "talent-tide");

        if(isset($_POST['submit'])){

           $firstName  = $_POST['firstName'];
           $lastName  = $_POST['lastName'];
           $email  = $_POST['email'];
           $jobRole  = $_POST['jobRole'];
           $address  = $_POST['address'];
           $cityName  = $_POST['cityName'];
           $pinCode  = $_POST['pinCode'];
           $date  = $_POST['date'];
           
           $cv = $_FILE['cv']['name'];
           $temp_name = $FILE['cv']['tmp_name'];

           move_uploaded_file($temp_name,"files/$cv");

          $inst = "INSERT INTO apply (firstName,lastName,email,jobRole,address,cityName,pinCode,date,cv) VALUES ('$firstName','$lastName','$email','$jobRole','$address','$cityName','$pinCode',NOW(),'$cv')";


           $run = mysqli_query($db,$inst);

           if($run){
            echo"<script>alert('Applied Successfully')</script>";
           }

        }



    ?>
    