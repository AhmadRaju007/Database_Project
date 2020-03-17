<html>
  <head>
  	<title > manager index page</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>       
    <link rel="stylesheet" href= "css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href= "css/style_new_product.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
  </head> 

  <body >
    <div   >
      <header>
        <div  style = "width:100%; ">
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

      <form method="post" class="form-horizontal" enctype="multipart/form-data" action="";return false;>
        <div class="col-md-12">
            <ul>
                <li>
                    <label for="resellerbillno" class="required"><b>পাইকারের বিল নং</b></label>
                    <input class="form-control" maxlength="255" name="resellerbillno" id="resellerbillno" placeholder="পাইকারের বিল নং" type="c_text" value="" required/>
                </li>

                <li>
                    <label for="resellername" class="required"><b>পাইকারের নাম</b></label>
                    <input class="form-control" maxlength="255" name="resellername" id="resellername" placeholder="পাইকারের নাম" type="c_text" value="" required/>
                </li>
                <li>
                    <label for="product_amount" class="required"><b>থানের সংখ্যা</b></label>
                    <input class="form-control" name="product_amount" id="product_amount" placeholder="থানের সংখ্যা" type="c_text" onchange="getProductField()" required/>
                </li>
              </ul>
              <div class="col-sm-12" style="padding-top: 10px; padding-left: 30px;" id='inputs'></div>
              <label for="total_inputs_meter" class="largefont" style="padding-left: 20px;"><b>মোট মিটার</b></label>
              <label for="total_inputs_gauge" class="largefont" style="padding-left: 20px;"><b>মোট গজ</b></label>
            <input type="submit" value="Save" class="btn_core btn_core_sm" name="_save"/>
        </div>
    </form>
    </div>
  </body>
</html>
<script>
  function getProductField(){
      var num=$('#product_amount').val();
      var i=1;
      var htm="<table><tr>";
      while(i<=num){
        htm+='<td><input id="" class="form-control" placeholder="'+i+'"></td>';
        if(i%4==0)
          htm+='</tr><tr>';
        i++;
      }
      htm+='</tr></table>';
      $('#inputs').html(htm);
  } 
</script>