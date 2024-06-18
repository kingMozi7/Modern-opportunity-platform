<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
    .abc{

    background-color: rgb(243, 230, 216);
}

form{
    margin:200px 500px 200px 500px;
    background-color: rgba(255, 255, 255, 0.5);
    padding: 25px;
}

</style>
</head>
<body class="abc">
	<form action="" method="post">
		<div class="form-group" >
			<label>Email</label>
			<input type="email" class="form-control" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="text" class="form-control" placeholder="Password" name="password">
		</div>
		<button class="btn btn-danger" type="submit" name="login">Login</button>
	</form>

</body>
</html>



<?php


if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $db = mysqli_connect("localhost", "root", "", "talent-tide");

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check in registration table
    $stmt = $db->prepare("SELECT * FROM registration WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == $user['password']) {
            // Redirect to employer.php
            header("Location: employer.php");
            exit();
        } else {
            echo "<script>alert('Incorrect password');</script>";
        }
    } else {
        // Check in registration2 table
        $stmt = $db->prepare("SELECT * FROM registration2 WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password == $user['password']) {
                // Redirect to jobseeker.php
                header("Location: jobseeker.php");
                exit();
            } else {
                echo "<script>alert('Incorrect password');</script>";
            }
        } else {
            echo "<script>alert('User not found');</script>";
        }
    }

    $stmt->close();
    mysqli_close($db);
}


?>
