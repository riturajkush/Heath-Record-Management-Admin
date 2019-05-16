<!DOCTYPE HTML>
<html>
<head>
  <title>Register Form</title>
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
  <h3>Patient Form</h3>
 <form action="insert.php" method="POST" enctype="multipart/form-data">
  <table>
   <tr>
    <td>Name :</td>
    <td><input type="text" name="username" required></td>
   </tr>
   <tr>
    <td>Password :</td>
    <td><input type="password" name="password" required></td>
   </tr>
   <tr>
    <td>Gender :</td>
    <td>
     <input type="radio" name="gender" value="m" required>Male
     <input type="radio" name="gender" value="f" required>Female
    </td>
   </tr>
   <tr>
     <td>Age :</td>
     <td><input type="text" name="Age" required></td>
   </tr>
   <tr>
     <td>Blood Group :</td>
     <td><input type="text" name="Blood_Group"></td>
   </tr>
   <tr>
    <td>Email :</td>
    <td><input type="email" name="email" required></td>
   </tr>
   <tr>
    <td>Phone no :</td>
    <td><input type="phone" name="phone" required></td>
   </tr>
   <tr>
     <td>Upload Photo</td>
     <td><input type="file" name="image"></td>
   </tr>
   <tr>
    <td><input type="submit" name="submit" value="Submit"></td>
   </tr>
  </table>
 </form>
<br>

<br>
<br>
<br>

  <footer>
    <p>HealthInfo, Copyright &copy; 2019</p>
  </footer>

</body>
</html>
