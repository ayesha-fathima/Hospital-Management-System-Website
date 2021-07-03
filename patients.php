<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
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

    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!-- // #end mainNav -->
   <style>
    .btn-group button {
  background-color: #4CAF50; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  width: 50%; /* Set a width if needed */
  display: block; /* Make the buttons appear below each other */
}

.btn-group button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #3e8e41;
}
td{
    border:2px solid black;

  }
   body{
    background-image: url("bg.jpeg");
    background-repeat: no-repeat;
    width: 100%;
    background-size: cover;
  }
</style>

    <div class="btn-group">
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav" style="width: 425px; padding-left:0;" >
                    	<button><a href="patients.php" class="active" style="text-decoration: none;
    color: white;">VIew All Patients</a></button>
                    	<button><a href="add-patient.php" style="text-decoration: none;
    color: white;">Add New Patient</a></button>
                    	<button><a href="assign-bed.php" style="text-decoration: none;
    color: white;">Assign/Unassign Beds</a></button>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
               
                
                <div id="main">
					<h3 style="    margin-left: 595px;">Patient Records</h3>
                    	<table  style="left: 410px;
    position: absolute;
    bottom: -256px;
    width: 580px;">
							<tr>
                                <td><b>Patient ID</b></td>
                                <td><b>Name</b></td>
                                <td><b>Age</b></td>
                                <td><b>Sex</b></td>
                                <td><b>Blood Group</b></td>
                                <td><b>Status</b></td>
                            </tr> 
                            <?php
								$result=mysqli_query($server,"SELECT p.*,pb.pat_id,pb.bed_id AS bed FROM patients p,pat_to_bed pb WHERE p.pat_id=pb.pat_id ORDER BY p.pat_id DESC");
								while($row=mysqli_fetch_row($result))
								{
									$status="";
									if($row[7]=="none"){ $status="Unassigned"; }
									elseif($row[7]>0){ $status="Admitted <font color=#c66653>{Bed $row[7]}</font>"; } else{ $status="<font color=#0d6efd>Discharged</font"; }
									
									
									$rn=$row['0'];
					 				if(strlen($rn)==1)
					 				$rn="000".$rn;
					 				elseif(strlen($rn)==2)
					 				$rn="00".$rn;
					 				elseif(strlen($rn)==3)
					 				$rn="0".$rn;
					 				elseif(strlen($rn)>3)
					 				$rn=$rn;
									
									echo"<tr class=odd>
                                	<td>$rn</td>
                                	<td>$row[1]</td>
                                	<td>$row[2]</td>
                                	<td>$row[3]</td>
                                	<td>$row[4]</td>
									<td>$status</td>
                            		</tr>";
								}
							?>                       
                        </table>
                        <br /><br />
                </div>

        </div>
                <!-- // #main -->
 <?php
	
?>               