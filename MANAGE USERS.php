<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage Users</title>
	<link rel="stylesheet" type="text/css" href="MANAGE USERS.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <style type="text/css">
  	.abc{
	background-color: rgb(243, 230, 216);
}
  	
  	table{
	margin: 50px 0px 0px 50px;
    width: 80%;
}
table, th, td{
border: 2px solid rgb(77, 51, 25);
height: 10px;

}
.aa{
    background-color: rgb(134, 89, 45);
    color:white;
    text-align: center;
    height: 40px;
}
.ab{
    background-color: rgba(134, 89, 45, 0.3);
    text-align: center;
    height: 40PX;
}

  </style>
</head>
<body style="display:flex;">
        <div id="part1" style="width: 30%;">
		<?php 
		include('sidebar.php');
		 ?>
         </div>
         <div id="part2" style="width: 70%;">
             <?php
$db = mysqli_connect("localhost", "root", "", "talent-tide");

if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    $update_query = "UPDATE registration SET status = 'Approved' WHERE id = $id";
    mysqli_query($db, $update_query);
}

if (isset($_POST['reject'])) {
    $id = $_POST['id'];
    $update_query = "UPDATE registration SET status = 'Rejected' WHERE id = $id";
    mysqli_query($db, $update_query);
}

$query = "SELECT * FROM registration";
$result = mysqli_query($db, $query);
?>
        
        <table>
    <tr class="aa">
        <th style="text-align: center;">Id</th>
        <th style="text-align:center;">Name</th>
        <th style="text-align:center;">E-mail</th>
        <th style="text-align:center;">Phone</th>
        <th style="text-align:center;">Password</th>
        <th style="text-align:center;"></th>
        <th style="text-align:center;"></th>
    </tr>

    <?php
    while ($rows = mysqli_fetch_assoc($result)) {
    ?>
        <tr class="ab">
            <td><?php echo $rows['registration_id']; ?></td>
            <td><?php echo $rows['name']; ?></td>
            <td><?php echo $rows['email']; ?></td>
            <td><?php echo $rows['phonenumber']; ?></td>
            <td><?php echo $rows['password']; ?></td>
            <td>
                <form method="post" >
                    <input type="hidden" name="id" value="<?php echo $rows['registration_id']; ?>">
                    <button type="submit" class="btn btn-success" name="approve">Approve</button>
                </form>
            </td>
            <td>
                <form method="post" >
                    <input type="hidden" name="id" value="<?php echo $rows['registration_id']; ?>">
                    <button type="submit" class="btn btn-danger" name="reject">Reject</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
         </div>

		

	
</body>
</html>