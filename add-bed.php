<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		$error="";
		$msg="<br><span class=msg>Bed Added Successfully</span><br><br>";
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

 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                        <div class="btn-group">
                    	<a href="beds.php" style="text-decoration: none;
    color: white;"><button>View All Beds</button></a>
                    	<a href="add-bed.php" style="text-decoration: none;
    color: white;" class="active"><button>Add New Bed</button></a>
                    </ul>
                    <!-- // .sideNav -->
                </div> 
                </div>   
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                
                
                <div id="main">
                <form method="post" class="jNice">
					<h3>Registration Form</h3>
                    <?php
						if(isset($_POST['save']))
						{
							$type=$_POST['type'];
							$ward=$_POST['ward'];
							
							if($type=="none"){ $error="<br><span class=error>Please select a type</span><br><br>"; }
							elseif($ward=="none"){ $error="<br><span class=error>Please select a ward</span><br><br>"; }
							else
							{
								mysqli_query($server,"INSERT INTO beds (type,ward) VALUES ('$type','$ward')");
								echo $msg;
							}
							
							if($error!=""){ echo $error; }
						}
					?>
                    	<fieldset>
                            <p><label>Type:</label>
                            <select name="type">
                            	<option value="none">[--------SELECT--------]</option>
                            	<option value="Manual">Manual</option>
                            	<option value="Bariatric">Bariatric</option>
                            	<option value="Full-Electric">Full-Electric</option>
                            	<option value="Semi-Electric">Semi-Electric</option>
                                <option value="Low Bed">Low Bed</option>
                            </select>
                            </p>
                            <p><label>Ward:</label>
                            <select name="ward">
                            	<option value="none">[--------SELECT--------]</option>
                            	<option value="Postnatal">Postnatal</option>
                            	<option value="Pregnancy">Pregnancy</option>
                            	<option value="Critical Care">Critical Care</option>
                            	<option value="Orthopaedic">Orthopaedic</option>
                                <option value="Psychiatric">Psychiatric</option>
                                <option value="Accidents And Emergency">Accidents And Emergency</option>
                                <option value="Paediatric">Paediatric</option>
                            </select>
                            </p>
                            <input type="submit" value="Save" name="save" />
                        </fieldset>
                    </form>
                        <br /><br />
                </div>
                <!-- // #main -->
 <?php
	
?>               