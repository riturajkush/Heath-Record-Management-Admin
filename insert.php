<!DOCTYPE html>
<html>
<head>
  <title>Confirmation</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header>
    <div class="container">
      <div id="branding">
        <h1><span class="highlight">HealthInfo</h1>
      </div>
      <nav>
        <ul>
          <li class="current"><a href="index.html">Home</a></li>

        </ul>
      </nav>
    </div>
  </header>







<p> Your key is: XB34873404710071</p>
<p> Copy it and keep it safe</p>






<?php
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$Age= $_POST['Age'];
$Blood_Group= $_POST['Blood_Group'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
$path = 'photo';
$path = $path."/".$image;
move_uploaded_file($tmp,$path);
if (!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "new";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT Into register (username, password, gender, Age, Blood_Group, email, phone,image) values(?, ?, ?, ?, ?, ?, ?,'{$path}')";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssissi", $username, $password, $gender, $Age, $Blood_Group, $email, $phone);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
}
?>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


  <footer>
    <p>HealthInfo, Copyright &copy; 2019</p>
  </footer>






</body>
</html>
