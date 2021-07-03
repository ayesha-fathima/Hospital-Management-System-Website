<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		$error="";
		$msg="<br><span class=msg>Patient Added Successfully</span><br><br>";
		require_once('header.php');
	}
?>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand"  href="#">HOSPITAL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"style="margin-left: 65px;"  aria-current="page" href="dashboard.php">DASHBOARD</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="patients.php">PATIENTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="beds.php">BEDS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">LOGOUT</a>
        </li>
        
      </ul>
     
    </div>
  </div>
</nav>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>
      .btn-group button {
  background-color: #4CAF50; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  width: 100%; /* Set a width if needed */
  display: block; /* Make the buttons appear below each other */
}

.btn-group button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #3e8e41;
}
body{
    background-image: url("bg.jpeg");
    background-repeat: no-repeat;
    width: 100%;
    background-size: cover;
  }
</style>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<div class="btn-group" style="width: 425px; padding-left:0;" >
                        <button><a href="patients.php" style="text-decoration: none;
    color: white;">View All Patients</a></button>
                    	<button><a href="add-patient.php" class="active" style="text-decoration: none;
    color: white;">Add New Patient</a></button>
                    	<button><a href="assign-bed.php" style="text-decoration: none;
    color: white;">Assign/Unassign Beds</a></button>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                
                
                <div id="main">
                <form method="post" class="jNice">
					<h3>Registration Form</h3>
                    <?php
						if(isset($_POST['save']))
						{
							$name=trim($_POST['name']);
							$age=trim($_POST['age']);
							$sex=$_POST['sex'];
							$bg=trim($_POST['bg']);
							$phone=trim($_POST['phone']);
							
							if($name==""){ $error="<br><span class=error>Please enter a name</span><br><br>"; }
							elseif($age==""){ $error="<br><span class=error>Please enter the age</span><br><br>"; }
							elseif($age<1){ $error="<br><span class=error>Please enter a value greater than zero for age</span><br><br>"; }
							elseif(!is_numeric($age)){ $error="<br><span class=error>Age must be a number</span><br><br>"; }
							elseif($sex=="none"){ $error="<br><span class=error>Please select the sex</span><br><br>"; }
							elseif($bg==""){ $error="<br><span class=error>Please enter a blood group</span><br><br>"; }
							elseif($phone==""){ $error="<br><span class=error>Please enter the phone number</span><br><br>"; }
							else
							{
								mysqli_query($server,"INSERT INTO patients (name,age,sex,blood_group,phone) VALUES ('$name','$age','$sex','$bg','$phone')");
								$result=mysqli_query($server,"SELECT pat_id FROM patients ORDER BY pat_id DESC LIMIT 0,1");
								$row=mysqli_fetch_array($result);
								
								mysqli_query($server,"INSERT INTO pat_to_bed (pat_id,bed_id) VALUES ('$row[pat_id]','none')");
								echo $msg;
							}
							
							if($error!=""){ echo $error; }
						}
					?>
                    	<fieldset>
                        	<p><label>Patient Name:</label><input type="text" name="name" class="text-long" autofocus value="  " /></p>
                            <p><label>Age:</label><input type="number" name="age" class="text-long" value="<?php echo $age; ?>" /></p>
                            <p><label>Sex:</label>
                            <select name="sex">
                            	<option value="none">[--------SELECT--------]</option>
                            	<option value="Male">Male</option>
                            	<option value="Female">Female</option>
                            	<option value="Transexual">Transexual</option>
                            	<option value="Other">Other</option>
                            </select>
                            </p>
                            <p><label>Bloog Group:</label><input type="text" name="bg" class="text-long" value=" " /></p>
                            <p><label>Phone Number:</label><input type="text" name="phone" class="text-long" value="  " /></p>
                            <input type="submit" value="Save" name="save" />
                        </fieldset>
                    </form>
                        <br /><br />
                </div>
                <!-- // #main -->
 <?php
	
?>               