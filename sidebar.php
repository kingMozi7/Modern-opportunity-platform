<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<title>Side Bar</title>
	<link rel="stylesheet" type="text/css" href="adminpannel.css">



	<style type="text/css">
		
		body {
  margin: 0;
  font-family: "Lato", sans-serif;
  background-color: rgb(243, 230, 216);
}
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: rgb(77, 51, 25);
  position: fixed;
  height: 100%;
  overflow: auto;
}
#tb2:hover{
  cursor: pointer;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color:  #271a0c;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color:#87592c;
  color: white;
}
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }

	</style>
</head>
<bodzy>


<div class="sidebar">
  <a class="" href="dashboard.php" target="_self">DASHBOARD</a>
  <a href="MANAGE USERS.php" target="_self">MANAGE USERS</a>
  <a  class="sub-btn" onclick="show()" id="tb2">JOB LISTING <i class="fas fa-angle-down dropdown"></i></a>
  <div class="sub-menu" style="display:none;" >
  	<a href="joblist.php" class="sub-item" target="_self">Job List</a>
  	<a href="jobview.php" class="sub-item" target="_self" >Job View</a>
  </div>
  <a href="REPORTING.php" target="_self">REPORTING</a>
</div>

<script type="text/javascript">
	var a = document.querySelector(".sub-menu");
  var flag = 0;
  function show(){
    if(flag==0){
    a.style.display="block";
    flag=1;
    }else{
      a.style.display="none";
      flag=0;
    }
  }
</script>

</body>
</html>