<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
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
			<label>Name</label>
			<input type="text" class="form-control" placeholder="Name" name="name">
		</div>
		<div class="form-group" >
			<label>Email</label>
			<input type="email" class="form-control" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			        <label>Phone Number</label>
                    <input type="tel" class="form-control" placeholder="Phone Number" name="phonenumber" />
                  </div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" placeholder="Password" name="password">
		</div>
		<button class="btn btn-danger" type="submit" name="submit">Sign Up</button>
	</form>

</body>
</html>

<?php
 
  
  // If upload button is clicked ...
  if (isset($_POST['submit'])) {
  
    $name= $_POST["name"];
   
       $email= $_POST["email"];

        $password= $_POST["password"];
        $phonenumber = $_POST["phonenumber"];
     
       

    $db = mysqli_connect("localhost", "root", "", "talent-tide");
      if ($password != $password) {
          echo  "<script>
          alert('password or confirm password are not matched');
          window.location.href='registration2.php'
          </script>";
        }
        else{


  
        // Get all the submitted data from the form
        
        $rgt = "INSERT INTO registration2 (name,email,phonenumber,password) VALUES ('$name', '$email','$phonenumber','$password')";

        if (mysqli_query($db,$rgt)) {
          echo  "<script>

      window.location.href='login.php'
      alert('Successfully Upload Your Data');

</script>
   ";
        }            
    }

  }
?>

