<?php
 $db = mysqli_connect("localhost", "root", "", "talent-tide");


 if(isset($_GET['ab'])){

 	$del_id = $_GET['ab'];

 	$delete = "delete from addjob where job_id = '$del_id'";
 	$run_del = mysqli_query($db, $delete);

 	if($run_del){

 		echo"
 		<script>

 		alert('Deleted successfully');
 		window.location.href='jobs1.php';

 		</script>
 		";
 	}

}


 ?>