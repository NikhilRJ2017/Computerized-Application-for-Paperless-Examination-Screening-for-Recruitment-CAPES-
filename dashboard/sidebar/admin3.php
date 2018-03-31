<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">




  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
           
      font-size: 20px;
      color: #111;
  }
   

  .btn {
      padding: 10px 20px;
      background-color: #e77637;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #e77637;
      background-color: #fff;
      color: #000;
  }
  
  
  .nav-tabs li a {
      color: #777;
	  
  }


  footer {
      background-color: #e77637;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }

 </style>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>
<body>
<h3 style="text-align:center;color:#777777;">Welcome to Online Examination <strong style="color:#e77637;"><?php echo $_SESSION['email'];?></strong></h3>

<h4 style="margin-top:-30px;float:right;"><a href="logout.php"> Logout  </a></h4>
<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
  <a href="admin.php" class="w3-bar-item w3-button">List of examiner</a>
  <a href="admin2.php" class="w3-bar-item w3-button">Examiners conducting online exams</a>
  <a href="#" class="w3-bar-item w3-button">Total Users</a>
</div>

<div class="w3-main" style="margin-left:200px">
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
  <?php
     $connect=mysqli_connect("localhost","root","","online_exam");
      $sq = "SELECT COUNT(JobSeekerID) from candidate";
      $re = mysqli_query($connect,$sq);
      $ro = mysqli_fetch_array($re);

    ?>
  <div class="w3-container" style="background-color:white;color:#777777">
    <h1 style="margin-top:-5px;">Total Users :        <?php echo $ro[0]?></h1>
    <?php
      $sq = ""
    ?>
  </div><hr>
</div>

<div class="w3-container">
  <input id="myInput" type="text" placeholder="Search..">
  <div class="container">

                                                                                    
  <div class="table-responsive" style="border:1px  black;width:100%;height:200px;overflow:scroll;">          
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Aadharcard</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Mobile Number</th>        
      </tr>
    </thead>
  <tbody  id="myTable">
     <?php
  $connect=mysqli_connect("localhost","root","","online_exam");

  $sql="select * from candidate";
  $records =mysqli_query($connect,$sql);
  while($row = mysqli_fetch_array($records))
  {
  echo "<tr>";



  echo "<td>". $row['Name']."</td>";
  echo "<td>". $row['Address']."</td>";
  echo "<td>". $row['Mobile']."</td>";
  echo "<td>". $row['State']."</td>";
  echo "<td>". $row['District']."</td>";
  echo "<td>". $row['Pincode']."</td>";
  echo "<td>". $row['Gender']."</td>";
  echo "<td>". $row['EmailID']."</td>";
  echo "<td>". $row['AadharCard']."</td>";


  ///echo "<td><a href=jaf.php>?id= $row['jaf'].</a> ."</td>";
  	

  	
  echo "<td><a href=delete.php?id=".$row['JobSeekerID']." onClick=\"return confirm('Are you sure you want to delete?');\">DELETE</td>";


  }


  ?>
    </tbody>
  </table>
  </div>
</div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
     
</body>
</html>

