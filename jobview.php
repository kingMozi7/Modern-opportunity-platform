<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>jobview</title>
	<link rel="stylesheet" type="text/css" href="jobview.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <style type="text/css">
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    html,body{
        width: 100%;
        height: 100%;
    }
  	body{
	background-color: rgb(243, 230, 216);
    display:flex;
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
<body style="">
	   <div id="part1" style="width:30%;">
		<?php
		include('sidebar.php');
		?>
		</div>
	
        <div id="part2" style="width:70%;">
    <table>
        <tr class="aa">
            <th style="text-align: center;">Id</th>
            <th style="text-align:center;">Job Title</th>
            <th style="text-align:center;">Job Description</th>
            <th style="text-align:center;">Price</th>
            <th style="text-align:center;">Requirements</th>
        </tr>
        <?php
        $db = mysqli_connect("localhost", "root", "", "talent-tide");
        $query = "SELECT * FROM job";
        $result = mysqli_query($db, $query);

        while ($rows = mysqli_fetch_assoc($result)) {
        ?>
            <tr class="ab">
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['title']; ?></td>
                <td><?php echo $rows['description']; ?></td>
                <td><?php echo $rows['price']; ?></td>
                <td><?php echo $rows['requirements']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>


</body>
</html>

