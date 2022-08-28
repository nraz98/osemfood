<?php 
  include 'conn.php';
  include 'api_controller.php';


   for ($i=0; $i<sizeof($decoded); $i++){
          //Add dessert value
	      $dessert_id = $decoded[$i]["id"];
		  $dessert_type = $decoded[$i]["type"];
	      $dessert_name = $decoded[$i]["name"];
		  $dessert_ppu = $decoded[$i]["ppu"];
		  
		    $sql = "INSERT INTO dessert (dessert_id, type, name, ppu) VALUES ('$dessert_id', '$dessert_type', '$dessert_name','$dessert_ppu')";
			
			$res = mysqli_query($conn, $sql);
			
			if($res ===TRUE)
			{
			  $return ="Succeed add dessert record";
			  
			}
			else
			{
			  $return = "Failed add dessert record";
			}
	   

	   //Add Batters value
	    for ($j=0; $j<sizeof($decoded[$i]["batters"]["batter"]); $j++){
			

			 $id = $decoded[$i]["batters"]["batter"][$j]["id"];
			 $type = mysqli_real_escape_string($conn,$decoded[$i]["batters"]["batter"][$j]["type"]);
			
			
			$sqlPKFK = "INSERT INTO batters (dessert_id, batter_id) VALUES ('$dessert_id', '$id')";
			$sql = "INSERT IGNORE INTO batter (batter_id, type) VALUES ('$id', '$type')";
		
		    $resPKFK = mysqli_query($conn, $sqlPKFK);
			$res = mysqli_query($conn, $sql);
			
			if($res ===TRUE &&  $resPKFK ===TRUE)
			{
			  $return ="Succeed add batter record";
			  
			}
			else
			{
			  $return = "Failed add batter record";
			}
        }
		
			 //Add topping value
		    for ($j=0; $j<sizeof($decoded[$i]["topping"]); $j++){
	   
			 $id = $decoded[$i]["topping"][$j]["id"];
			 $type = mysqli_real_escape_string($conn,$decoded[$i]["topping"][$j]["type"]);
			
			
	        $sqlPKFK = "INSERT INTO dessert_topping (dessert_id, topping_id) VALUES ('$dessert_id', '$id')";
			$sql = "INSERT IGNORE INTO topping (topping_id, type) VALUES ('$id', '$type')";
		   
		   $resPKFK = mysqli_query($conn, $sqlPKFK);
			$res = mysqli_query($conn, $sql);
			
			if($res ===TRUE&& $resPKFK)
			{
			  $return ="Succeed add topping record";
			  
			}
			else
			{
			  $return = "Failed add topping record";
			}
        }
  
  
 
   }
  

  

?>