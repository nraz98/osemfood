<?php
  // Create database connection
  include 'conn.php';

  $result = mysqli_query($conn, "SELECT * FROM dessert");
?>


	<?php
 
   include 'conn.php';
    if(isset($_POST['id']))
    {
     
      $id = $_POST['id'];
     $sql = "SELECT D.topping_id, T.type FROM dessert_topping D INNER JOIN topping T ON D.topping_id = T.topping_id WHERE dessert_id='$id'";
	 $topping = mysqli_query($conn, $sql); // fetch data
	 $lalla = mysqli_fetch_assoc($topping);
	 echo json_encode( $lalla);

   
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>OSEM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:10px}
.button {
  background-color:#000000;
  border: none;
  color: white;
  padding: 12px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>



<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left">☰</div>
    <div class="w3-right w3-padding-16"></div>
    <div class="w3-center w3-padding-16">OSEM DONUT</div>
  </div>
</div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
    <?php
	
		while ($row = mysqli_fetch_array($result)) {
		   $id = $row['dessert_id'];
			echo "<div class='w3-quarter  w3-center'>";
			echo "<img src='images/".$row['name'].".jpg' style='width:100%;height:400px'>";
			echo "<h3 style='text-transform:uppercase;'>".$row['type']." | ".$row['name']." | ".$row['ppu']." </h3>";
			echo "<button class='button' value = '$id'  onClick='addTopping(this)'>Topping</button>";
            echo "<button class='button' value = '$id'  onClick='addBatters(this)'>Batters</button>";
			echo "</div>";
		 
		}
	?>
  </div>
  

<!-- End page content -->
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<div id="donut"></div>
   <div id="donuts"></div>
  </div>

</div>

<script>

 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

<script>

function addTopping(item) {

  document.getElementById("donut").innerHTML ='';
    // jQuery Ajax Post Request
    $.post('get_topping.php', {
        id:item.value
    }, (response) => {
		
        // response from PHP back-end
        var  obj =JSON.parse(response);

	    document.getElementById("donut").innerHTML += 
           "<h5>Toppings</h5>";
		 document.getElementById("donuts").innerHTML ='';
		for (var i = 0; i <obj.length; i++) {
		
		  var topping = obj[i].type;
	
          
	      document.getElementById("donuts").innerHTML += 
           "<h6>"+topping+"</h6>";
        }

		 modal.style.display = "block";
    });
	
}

function addBatters(item) {

  document.getElementById("donut").innerHTML ='';
    // jQuery Ajax Post Request
    $.post('get_batters.php', {
        id:item.value
    }, (response) => {
		
        // response from PHP back-end
        var  obj =JSON.parse(response);

	    document.getElementById("donut").innerHTML += 
           "<h5>Batters</h5>";
		 document.getElementById("donuts").innerHTML ='';
		for (var i = 0; i <obj.length; i++) {
		
		  var batters = obj[i].type;
	
          
	      document.getElementById("donuts").innerHTML += 
           "<h6>"+batters +"</h6>";
        }

		 modal.style.display = "block";
    });
	
}

// Get the modal
var modal = document.getElementById("myModal");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
