<?php
include('include/connect.php');

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
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
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
            <ul >
             <li class="item" id="profile">
              <a href="manager_index.php" class="btn"><i class="far fa-user"></i>আজকের হিসাব</a>
             </li>
              <li class="item" id="messages">
              <a href="new_product.php" class="btn"><i class="far fa-envelope-open"></i>ক্রয়ের হিসাব</a>
            </li>
            <li class="item" id="settings">
              <a href="#settings" class="btn"><i class="fas fa-cog"></i>Settings</a>
              <div class="smenu">
                <a href="#" onclick="showUserInfo()">Password</a>

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
      
        <br/>
        <br/>

        
        <br/>
        <br/>
        <section>
          <div class="form-group custom-input-space has-feedback"  style="color: #006400">
           
            <div class="page-body clearfix">
              <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="panel-heading"><h3>আজকের হিসাব </h3></div>
                      <a  href="newBill.php";><button class="bttn bttn_center">নতুন বিল </button></a>
                      
                   		<table class= "table table-dark">
                   			<thead>
	                   			<th> বিল নাম্বার </th>
	                   			<th> তারিখ</th>
                          <th> কাস্টমারের নাম </th>
                          <th> বাকির পরিমাণ </th>
	                   			<th> টাকা </th>
	                   		</thead>
	                   		<tbody>
	                   			<?php
	                   				$con = mysqli_connect('127.0.0.1:3306', 'root', '','login');
                                    $cDate = date("Y-m-d");

                                    $sql= "SELECT bill_no, c_date, customer_name, due_amount,  gross_total_price FROM bill_info where c_date LIKE '$cDate%'";// date(\"Y-m-d\")";

                                    $reslt = mysqli_query ($con,$sql);
                                  //  echo($reslt);
                                    if($reslt) {
                                        while ($row = mysqli_fetch_array($reslt)) {
                                            if (!$row) {
                                                printf("Error: %s\n", mysqli_error($con));
                                                exit();
                                            }
                                           echo "<tr> <td> " . $row["bill_no"] . "</td> <td> " . $row["c_date"] . "</td> <td> " . $row["customer_name"] . "</td> <td> " . $row["due_amount"] . "</td> <td> " . $row["gross_total_price"] . "</td></tr>";
                                        }
                                    }
                                    else
                                        echo "<tr>No Results found!</tr>";

	                   				$con -> close();
	                   			?>
	                   		</tbody>
                   		</table>
                   	
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

    <script >
    
  $(document).ready(function(){
     var columns = [
    
      ];
    $('#post_list').dataTable({
        //"destroy": true,
        "bprocessing": true,
        "serverSide": true,
        "scrollX": true,
        "paging": true,
        "info": false,
        "scrollCollapse": true,
        "lengthMenu": [
            [20, 25, 50, 100, 150, 200, 500, 1000],
            [20, 25, 50, 100, 150, 200, 500, 1000]
        ],
        "bFilter": false,
        "columnDefs": [{
          "targets": [0,2,3],"orderable": true,},
        ],
        dom: 'Blfrtip',
        buttons:[
            'csv','excel', 'print'
        ],
         "ajax": {
            url: "post_list.php",
            type: "POST",

        },
    });
  });
    </script>

   


 </body>

</html>
