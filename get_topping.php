
	<?php
 
   include 'conn.php';
    if(isset($_POST['id']))
    {
     
     $id = $_POST['id'];
     $sql = "SELECT D.topping_id, T.type FROM dessert_topping D INNER JOIN topping T ON D.topping_id = T.topping_id WHERE dessert_id='$id'";
	 $topping = mysqli_query($conn, $sql);

	$resArray = array();
	while ($row = mysqli_fetch_assoc($topping)) 
	{
		
		$resArray[] =$row;
	}	
	
	 echo json_encode($resArray);

   
    }
?>
