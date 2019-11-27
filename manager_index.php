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
                      <a  href="addUser.php";><button class="bttn bttn_center">নতুন বিল </button></a>
                      
                   		<table class= "table table-dark">
                   			<thead>
	                   			<th> বিল নাম্বার </th>
	                   			<th> কাস্টমারের নাম</th>
	                   			<th> কাপড়ের নাম </th>
	                   			<th> কাপড়ের নাম্বার </th>
	                   			<th> মিটার </th>
	                   			<th> গজ </th>
	                   			<th> দর </th>
	                   			<th> টাকা </th>
	                   			<th> বাকির পরিমাণ </th>
	                   		</thead>
	                   		<tbody>
	                   			<?php
	                   				$con = mysqli_connect('127.0.0.1:3306', 'root', '','login');
                                    $cDate = date("Y-m-d");
                                   // echo $cDate;
                                    //$p= "SELECT "
	                   				$sql= "SELECT bill_no, c_date, p_name, p_id, m_units, g_units, unit_price, total_price, due_amount FROM bill_info where c_date LIKE '$cDate%'";// date(\"Y-m-d\")";
	                   				//$sql = "Select date(c_date) from bill_info";
	                   				$reslt = mysqli_query ($con,$sql);
                                    if(isset ($reslt)) {
                                        while ($row = mysqli_fetch_array($reslt)) {
                                            if (!$row) {
                                                printf("Error: %s\n", mysqli_error($con));
                                                exit();
                                            }
                                            //echo "<tr><td>". $row["c_date"]."</td></tr>";
                                           echo "<tr> <td> " . $row["bill_no"] . "</td> <td> " . $row["c_date"] . "</td> <td> " . $row["p_name"] . "</td> <td> " . $row["p_id"] . "</td> <td> " . $row["m_units"] . "</td> <td> " . $row["g_units"] . "</td> <td> " . $row["unit_price"] . "</td> <td> " . $row["total_price"] . "</td> <td> " . $row["due_amount"] . "</td></tr>";
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
    /*  function ShowUserInfo(){
        var html = '<table class="table table-bordered showdeliveryreportstable" id = "datatable">' +
                       
                        '</table>';
                    $('.deliveryreportssection').html(html);
        var dataSet = {};
        var columns = [{
            "title": 'Id',
            "data": "Id"
        },
        {
            "title": 'Username',
            "data": "Username"
        },
        {
            "title": 'Password',
            "data": "Password"
        },
        ,
        {
            "title": 'Action',
            "data": "Action"
        }
    ];
    
    var table_name = ".showdeliveryreportstable";
    }*/
  $(document).ready(function(){
     var columns = [
      /*  {
            "title": 'Action',
            "class": "text_center",
            "data": "areaoragent"
        },
       {
            "title": 'Id',
            "class": "text_center",
            "data": "array[0]"
        },
        {
            "title": 'Username',
            "class": "text_center",
            "data": "array[1]"
        },
        {
            "title": 'Password',
            "class": "text_center",
            "data": "array[2]"
        },*/
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
        //"columns": columns,
      /*  "order": [
            [1, "desc"]
        ], */
        "bFilter": false,
        "columnDefs": [{
          "targets": [0,2,3],"orderable": true,},
          //{"targets": [1,2,3],"searchable": false},
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



