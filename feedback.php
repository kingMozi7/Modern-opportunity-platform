<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Feedback</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body, html {
      height: 100%;
      margin: 0;
    }
    body{
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: rgb(243, 230, 216);
    }
    #feedback {
      width: 60%;
      height: 90%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: rgba(255, 255, 255, 0.5);
      padding: 20px;
    }
    #feedback h2{
      font-size: 30px;
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: 3px;
    }
    #feedback form {
      max-width: 500px;
      width: 100%;
    }
    #feedback form .form-control {
      width: calc(100% - 30px); /* Adjusted width to match input fields */
    }
    textarea {
      width: calc(100% - 30px); /* Adjusted width to match input fields */
      resize: none;
    }
  </style>
</head>
<body>

<div id="feedback">
  <h2>Feedback</h2>
  <form method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" type="text" id="name" name="name">
    </div>
    <div class="form-group">
      <label for="email">E-mail</label>
      <input class="form-control" type="text" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="feedback">Feedback</label>
      <textarea class="form-control" id="feedback" name="feedback"></textarea>
    </div>
    <div class="form-group text-center">
      <input class="btn btn-success" type="submit" name="submit" value="Submit">
    </div>
  </form>
</div>

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
              window.location.href='feedback.php';
            </script>";
    } else {
      echo "<script>alert('Error: " . mysqli_error($db) . "');</script>";
    }
  }
}
?>

</body>
</html>
