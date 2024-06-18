<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Job Form</title>
	<link rel="stylesheet" type="text/css" href="job form.css">
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
.aa{
	margin-left: 40%;
}
  </style>
</head>
<body class="abc">

	<div class = "col-md-2">
<?php
include('sidebar.php');
?>

</div>

<div class="col-md-10">
	<form action="" method="post">
		<div class="form-group" >
			<label> Job Title</label>
			<input type="text" class="form-control" placeholder="Job Title" name="title" >
		</div>
		<div class="form-group" >
			<label>Job Description</label>
			<input  type="text" class="form-control" placeholder="Description" name="description" >
		</div>
		<div class="form-group">
			        <label>Price</label>
                    <input type="text" class="form-control" placeholder="Price" name="price"  />
                  </div>
		<div class="form-group">
			<label>Requirements</label>
			<input type="text" class="form-control" placeholder="Requirements" name="requirements" >
		</div>
		<button class="btn btn-danger aa" type="submit" name="submit">Submit</button>
	</form>
</div>
</body>
</html>

<?php
 
  
  // If upload button is clicked ...
  if (isset($_POST['submit'])) {
  
    $title= $_POST["title"];
   
       $description= $_POST["description"];

        $price= $_POST["price"];
        $requirements = $_POST["requirements"];
     
       

    $db = mysqli_connect("localhost", "root", "", "talent-tide");
      if (!isset($title)) {
          echo  "<script>
          alert('please fill the form');
          window.location.href='job form.php'
          </script>";
        }
        else{


  
        // Get all the submitted data from the form
        
        $rgt = "INSERT INTO job (title,description,price,requirements) VALUES ('$title', '$description','$price','$requirements')";

        if (mysqli_query($db,$rgt)) {
          echo  "<script>

      window.location.href='job form.php'
      alert('Successfully Upload Your Data');

</script>
   ";
        }            
    }

  }
?>