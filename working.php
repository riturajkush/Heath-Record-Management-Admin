<?php
ob_start();
session_start()
 ?>

<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Medical Records</title>


    <!-- style-->
    <style>
    body {font-family: Arial;}

    /* Style the tab */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 18px 16px;
      transition: 0.3s;
      font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }
    </style>

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


    <?php
    echo $_SESSION['sess_user'];
     ?>

    <h1>Medical Records</h1>
    <button onclick="location.href = 'login.php';" id="myButton" class="float-left submit-button" >New Login</button>

    <?php

	$conn=mysqli_connect( "localhost", "root", "", "new" ) or die("Could not connect: " .mysqli_error($conn) );

	$getImage=mysqli_query($conn, "SELECT image FROM register Where email = '{$_SESSION['sess_user']}'") or die("Could not retrieve image: " .mysqli_error($conn));
  $rst = mysqli_query($conn,"SELECT * FROM register Where email = '{$_SESSION['sess_user']}'");

	$path=mysqli_fetch_assoc($getImage) or die("Could not fetch array : " .mysqli_error($conn));
  $val = mysqli_fetch_assoc($rst) or die("Could not fetch array : " .mysqli_error($conn));

    ?>

    <div class="card mb-3" style="max-width: 540px; left:40%" >
      <h5 class=""><b>Patient Name: <?php echo $val['username'];?></b></h5>
      <div class="row no-gutter">
        <div class="col-md-4">
          <img src= "<?php echo $path['image'];?>" class="card-img" alt="name">
        </div>
        <div class="col-md-8">
          <div class="patient-info">

            <p class="Blood-Group"><b> Blood Group: <?php echo $val['Blood_Group'];?> </b> </p>
            <p class="Age"><b> Age: <?php echo $val['Age'];?> </b> </p>
            <p class="Contact-No"> <b> Contact No: <?php echo $val['phone'];?> </b></p>

          </div>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>







  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">Enter Data</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Past Record</button>
  </div>



    <!-- Form entry -->




  <div id="London" class="tabcontent">

    <form action="insert-data.php" method="POST" class="needs-validation" novalidate>
    <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Enter disease Name</label>
      <input type="text" name="disease" class="form-control" id="validationCustom01" placeholder="Disease Name" value="" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Tests Required</label>
      <input type="text" name="tests" class="form-control" id="validationCustom02" placeholder="Tests name" value="" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationCustom03">Starting Date</label>
      <input type="text" name="str_date" class="form-control" id="validationCustom03" placeholder="YYYY-MM-DD" value="" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom04">Prescription for Disease</label>
      <input type="text" name="prescription" class="form-control" id="validationCustom04" placeholder="Prescription" required>
      <div class="invalid-feedback">
        Please provide a prescription.
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
</div>


<!-- Past Records -->


  <div id="Paris" class="tabcontent">

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Disease</th>
          <th scope="col">Prescription</th>
          <th scope="col">Tests</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "new");
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT s_no, disease, prescription, tests, str_date FROM medical Where email = '{$_SESSION['sess_user']}'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr><th>" . $row["s_no"]. "</th><td>" . $row["disease"] . "</td><td>"
      . $row["prescription"]. "</td><td>" . $row["tests"]. "</td><td>" . $row["str_date"]. "</td></tr>";
    }
  echo "</table>"; }
  else { echo "0 results"; }
  $conn->close();
    ?>
    <!--  <tbody>
        <tr>
          <th scope="row">1</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>

  </div> -->







<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {

  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();



  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

</script>
  </body>
</html>
