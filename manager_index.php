<?php

//session_start();

$con = mysqli_connect('127.0.0.1:3308', 'root', '','login');

if(isset($_POST["insert"]))
{
	$file = addslashes( file_get_contents($_FILES["image"]["tmp_name"]));
	//echo "$file";

	$query = "INSERT INTO user(img_name) VALUES ('$file')";

	if(mysqli_query($con, $query))
	{
		echo "Image Inserted into Database";
	}
}
?>

<html>
  <head>
  	<title > manager index page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           
    <link rel="stylesheet" href= "css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href= "css/style_manager_index.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  </head> 

  <body>
    <header>
      <div class="container_nav" style = "width:100%; ; background-color:#EEE8AA;">
      <nav>
        <ul>
          <li><a href="login.php">Login</a></li>
          <li><a href="registration.php">Register</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="career.php">Career</a></li>
          
        </ul>
      </nav>
    </div>
    </header>
    
  	<br/><br/>

  	<div class="container" style = "width:90%; margin: 8px 5%; background-color: #154360;">
  		<form method="post" enctype="multipart/form-data">
  			<h3 align="center"> Insert and Display image</h3>
  			<input type="file" name="image" id="image" align="center"> <br/>
  			 <input type="submit" name="insert" id="insert" value="Insert" class="btn-btn-info"/>
  		</form>
  	</div>
  	<br/>
  	<br/>

  	<div class="container">
  		<table class="table table-bordered">
  			<tr>
  				<th> Image </th>
  			</tr>
  			<?php /*
  			$query = "SELECT * FROM user ORDER BY id DESC";
  			$result = mysqli_query($con, $query);
  			while($row = mysqli_fetch_array($result))
  			{
  				echo '
  					<tr>
  						<td>
  							<img src="data:image/jpeg;base64,'.base64_encode($row['img_name'] ).'" height="200" width="200" " />	
  						</td>
  					</tr>
  				';
  			}
        */
  			?>

  	</div>
  </body>

</html>

<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script> 