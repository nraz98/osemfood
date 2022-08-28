
	<?php
 
   include 'conn.php';
    if(isset($_POST['id']))
    {
     
     $id = $_POST['id'];
     $sql = "SELECT D.batter_id, B.type FROM batter B INNER JOIN batters D ON D.batter_id = B.batter_id WHERE D.dessert_id='$id'";
	 $topping = mysqli_query($conn, $sql);

	$resArray = array();
	while ($row = mysqli_fetch_assoc($topping)) 
	{
		
		$resArray[] =$row;
	}	
	
	 echo json_encode($resArray);

   
    }
?>
