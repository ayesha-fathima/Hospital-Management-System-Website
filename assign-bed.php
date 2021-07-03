<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		$error="";
		$error2="";
		$msg="<br><span class=msg>Bed Assigned Successfully</span><br><br>";
		$msg2="<br><span class=msg>Bed Has Been Unssigned Successfully</span><br><br>";
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
                    	<div class="btn-group" style="width: 425px; padding-left:0;" >
                        <button><a href="patients.php" style="text-decoration: none;
    color: white;">VIew All Patients</a></button>
                    	<button><a href="add-patient.php" class="active" style="text-decoration: none;
    color: white;">Add New Patient</a></button>
                    	<button><a href="assign-bed.php" style="text-decoration: none;
    color: white;">Assign/Unassign Beds</a></button>
                    </ul>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                
                
                <div id="main">
                <form method="post" class="jNice" name="frm1">
					<h3>Assign Beds</h3>
                    <?php
						if(isset($_POST['assign']))
						{
							$patient=$_POST['patient'];
							$bed=$_POST['bed'];
							
							if($patient=="none"){ $error="<br><span class=error>Please select a patient</span><br><br>"; }
							elseif($bed=="none"){ $error="<br><span class=error>Please select a bed</span><br><br>"; }
							else
							{
								$result4=mysqli_query($server,"SELECT * FROM pat_to_bed WHERE bed_id='$bed'");
								if($row4=mysqli_num_rows($result4)>0){ $error="<br><span class=error>Bed $bed has already been assigned to a patient</span><br><br>"; }
								else
								{
									mysqli_query($server,"UPDATE pat_to_bed SET bed_id='$bed' WHERE pat_id='$patient'");
									echo $msg;
								}
							}
							
							if($error!=""){ echo $error; }
						}
					?>
                    	<fieldset>
                            <p><label>Patient:</label>
                            <select name="patient">
                            	<option value="none">[--------SELECT--------]</option>
                                <?php
									$result=mysqli_query($server,"SELECT p.pat_id,p.name,pb.pat_id,pb.bed_id FROM patients P, pat_to_bed pb WHERE p.pat_id=pb.pat_id AND pb.bed_id='none' ORDER BY p.pat_id DESC");
									while($row=mysqli_fetch_row($result))
									{
										$rn=$row['0'];
					 					if(strlen($rn)==1)
					 					$rn="000".$rn;
					 					elseif(strlen($rn)==2)
					 					$rn="00".$rn;
					 					elseif(strlen($rn)==3)
					 					$rn="0".$rn;
					 					elseif(strlen($rn)>3)
					 					$rn=$rn;
										echo"<option value=$row[0]>$rn - $row[1]</option>";
									}
								?>
                            </select>
                            </p>
                            <p><label>Bed:</label>
                            <select name="bed">
                            	<option value="none">[--------SELECT--------]</option>
                            	<?php
									$result2=mysqli_query($server,"SELECT * FROM beds ORDER BY bed_id DESC");
									while($row2=mysqli_fetch_assoc($result2))
									{
										echo"<option value=$row2[bed_id]>Bed $row2[bed_id] - $row2[type]</option>";
									}
								?>
                            </select>
                            </p>
                            <input type="submit" value="Assign Bed" name="assign" />
                        </fieldset>
                    </form>
                        <br /><br />
                    <form method="post" class="jNice" name="frm2">
					<h3>Unssign Beds</h3>
                    <?php
						if(isset($_POST['unassign']))
						{
							$ptb=trim($_POST['ptb']);
							
							if($ptb=="none"){ $error2="<br><span class=error>Please select a relationship</span><br><br>"; }
							else
							{
								mysqli_query($server,"UPDATE pat_to_bed SET bed_id=0 WHERE pat_id='$ptb'");
								echo $msg2;
							}
							
							if($error2!=""){ echo $error2; }
						}
					?>
                    	<fieldset>
                            <p><label>Patient - Bed Relationship:</label>
                            <select name="ptb">
                            	<option value="none">[--------SELECT--------]</option>
                                <?php
                                $result3=mysqli_query($server,"SELECT p.pat_id,p.name,pb.pat_id,pb.bed_id FROM patients P, pat_to_bed pb WHERE p.pat_id=pb.pat_id AND pb.bed_id>0 ORDER BY p.pat_id DESC");
									while($row3=mysqli_fetch_row($result3))
									{
										$rn=$row3['0'];
					 					if(strlen($rn)==1)
					 					$rn="000".$rn;
					 					elseif(strlen($rn)==2)
					 					$rn="00".$rn;
					 					elseif(strlen($rn)==3)
					 					$rn="0".$rn;
					 					elseif(strlen($rn)>3)
					 					$rn=$rn;
										echo"<option value=$row3[0]>Bed $row3[3] to $rn - $row3[1]</option>";
									}
									?>
                            </select>
                            </p>
                            <input type="submit" value="Unassign Bed" name="unassign" />
                        </fieldset>
                    </form>
                </div>
                <!-- // #main -->
 <?php
	
?>               