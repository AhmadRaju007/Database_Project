<?php

session_start();

$con = mysqli_connect('127.0.0.1:3306', 'root', '','login');

if(!isset($_SESSION['username']))
{

  $_SESSION['not']=1;
  header('location:login.php');
   
}

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>       
    <link rel="stylesheet" href= "css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href= "css/style_manager_index.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
  </head> 

  <body >
    <div class="bgnd" >
      <header>
        <div class="container_nav" style = "width:100%; ">
          <nav>
            <ul>
             <li class="item" id="profile">
              <a href="#profile" class="btn"><i class="far fa-user"></i>Profile</a>
              <div class="smenu">
                <a href="#">Posts</a>
                <a href="#">Pictures</a>
              </div>
             </li>
              <li class="item" id="messages">
              <a href="#messages" class="btn"><i class="far fa-envelope-open"></i>Messages</a>
              <div class="smenu">
                <a href="#">New</a>
                <a href="#">Sent</a>
                <a href="#">Spam</a>
              </div>
            </li>
            <li class="item" id="settings">
              <a href="#settings" class="btn"><i class="fas fa-cog"></i>Settings</a>
              <div class="smenu">
                <a href="#">Password</a>
                <a href="#">Language</a>
              </div>
            </li>
             <li class="item">
              <a class="btn" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </li>
            </ul>
          </nav>
        </div>
      </header>
      
    	<br/><br/>
      
      	<div class="container" style = "width:90%; margin: 8px 5%; background-color: #154360; color:#f7dc6f  ;">
      		<form method="post" enctype="multipart/form-data">
      			<h3 align="center"> Insert and Display image</h3>
      			<input type="file" name="image" id="image" align="center"> <br/>
      			 <input type="submit" name="insert" id="insert" value="Insert" class="btn-btn-info"/>
      		</form>
      	</div>
      
      	<br/>
      	<br/>
        <section>
          <div class="form-group custom-input-space has-feedback"  style="color: #006400">
            <div class="page-heading">
              <h3 class="post-title"> Server Side Processing DataTable</h3>
            </div>
            <div class="page-body clearfix">
              <div class="row">
                <div class="col-md-offset-2 col-md-8">
                  <div class="panel panel-default">
                    <div class="panel-heading">Post Details List: </div>
                    <table id="post_list" width="100%"   style="color: #804000  ;padding-left: 20px; ">
                      <thead>
                        <tr class="success">
                          <th> Status </th>
                          <th> No.</th>
                          <th> Username </th>
                          <th> Password </th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>

          </div>
        </section>

    </div>
    
   
    <script>
      $(".container").ripples({
        resolution: 100,
        perturbance: 0.02,
      })
    </script>
    
    <script>
      $(".container_nav").ripples({
        resolution: 100,
        perturbance: 0.02,
      })
    </script>

    <script>
    $(document).ready(function(){
      $('#post_list').dataTable({

        "bProcessing":true,
        "serverSide": true,
        "order": [
                    [1, "desc"]
                ],
                "columnDefs": [{
                    "targets": [0, 2],
                    "orderable": false
                }],
        "ajax":{
          url :"post_list.php",
          type : "POST",
        }
      });

    });
    </script>
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

