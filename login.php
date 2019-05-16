<?php
ob_start();
session_start()
 ?>

<html>
<head>
<title>Login</title>
    <style>
        body{

    margin-top: 100px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 80px;
    background-color: azure ;
    color: palevioletred;
    font-family: verdana;
    font-size: 100%

        }
            h1 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
}
        h3 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
} </style>

<link rel="stylesheet" href="./css/style.css">
</head>
<body>


  <header>
		<div class="container">
			<div id="branding">
				<h1><span class="highlight">Health Info</h1>
			</div>
			<nav>
				<ul>
					<li class="current"><a href="index.html">Home</a></li>

				</ul>
			</nav>
		</div>
	</header>


   <p><a href="form.php">Register</a> | <a href="login.php">Login</a></p>
<h3>Login for information</h3>
<form action="" method="POST">
Email: <input type="text" name="email"><br />
Password: <input type="password" name="password"><br />
<input type="submit" value="Login" name="submit" />
</form>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];

    $con=mysqli_connect('localhost','root','') or die(mysqli_error());
    mysqli_select_db($con,'new') or die("cannot select DB");

    $query=mysqli_query($con,"SELECT * FROM register WHERE email='".$email."' AND password='".$password."'");
    $numrows=mysqli_num_rows($query);
    if($numrows!=0)
    {
    while($row=mysqli_fetch_assoc($query))
    {
    $dbemail=$row['email'];
    $dbpassword=$row['password'];
    }

    if($email == $dbemail && $password == $dbpassword)
    {
    session_start();
    $_SESSION['sess_user']=$email;

    /* Redirect browser */
    header("Location: working.php");
    }
    } else {
    echo "Invalid username or password!";
    }

} else {
    echo "All fields are required!";
}
}
?>


<footer>
  <p>Health Info, Copyright &copy; 2019</p>
</footer>
</body>
</html>
