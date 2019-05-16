<?php
ob_start();
session_start()
 ?>
<!DOCTYPE html>
<html>
<head>
  <title> Confirmed </title>
</head>
<body>

Record Entered Successfully

  <?php
  $disease = $_POST['disease'];
  $prescription = $_POST['prescription'];
  $tests = $_POST['tests'];
  $str_date = $_POST['str_date'];
  //$s_no=0;              //p_key to be added

  if (!empty($disease) || !empty($prescription) || !empty($tests) || !empty($str_date))  { //p_key to be added
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "new";

      //Create connection
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if (mysqli_connect_error()) {
       die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else{
      $SELECT = "SELECT s_no From medical Where s_no = ? Limit 1";
      $INSERT = "INSERT Into medical (disease, prescription, tests, str_date, email) values(?, ?, ?, ?, '{$_SESSION['sess_user']}')"; //p_key to be added
      //Prepare statement
      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("i", $s_no);
      $stmt->execute();
      $stmt->bind_result($s_no);
      $stmt->store_result();
      $rnum = $stmt->num_rows;
      if($rnum==0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param('ssss', $disease, $prescription, $tests, $str_date); //p_key to be added
        $stmt->execute();
        echo "New record inserted sucessfully";
      }
      else {
        echo "insertion problem" ;
      }
      $stmt->close();
      $conn->close();
     }
 } else {
  echo "All field are required";
  die();
 }
 ?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>

</body>
</html>
