<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		require_once('header.php');
	}
?>

  
        
        <!-- // #end mainNav -->
       
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

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
 <style>
  h1{
    color: blue;
    background-color: white;
  }
  body{
    background-image: url("bg.jpeg");
    background-repeat: no-repeat;
    width: 100%;
    background-size: cover;
  }
  td{
    border:2px solid black;

  }
</style>
</div>
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<h2 style="margin-left:465px">Welcome, <?php echo $_SESSION['name']; ?></h2>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                
                <div id="main">
					<h3 style=" margin-left: 585px;
    margin-top: 105px;">Statistics</h3>
               	  
                  <?php
				  	$result=mysqli_query($server,"SELECT COUNT(pat_id) FROM patients");
					$row=mysqli_fetch_row($result);
					
					$result2=mysqli_query($server,"SELECT COUNT(bed_id) FROM beds");
					$row2=mysqli_fetch_row($result2);
					
					$result3=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id>0");
					$row3=mysqli_fetch_row($result3);
					
					$result4=mysqli_query($server,"SELECT COUNT(bed_id) FROM pat_to_bed WHERE bed_id>0");
					$row4=mysqli_fetch_row($result4);
					
					$result5=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id=0 AND bed_id!='none'");
					$row5=mysqli_fetch_row($result5);
					
					$row6[0] = $row2[0] - $row4[0];
					
					$result7=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id='none'");
					$row7=mysqli_fetch_row($result7); ?>
					
					<table style="left:520px; transform:scale(1.5); position:absolute; bottom:145px;">
					
  							<tr>
    							<td align=center valign=middle><b>Patients</b></td>
    							<td align=center valign=middle><b>Beds</b></td>
  							</tr>
  							<tr>
    							<td align=center valign=middle>Total - <?php echo $row[0]?></td>
    							<td align=center valign=middle>Total -<?php echo $row2[0]?></td>
							</tr>
  							<tr>
    							<td align=center valign=middle>Admitted - <?php echo $row3[0]?></td>
    							<td align=center valign=middle>Occupied - <?php echo $row4[0]?></td>
							</tr>
  							<tr>
   		 						<td align=center valign=middle>Discharged -<?php echo $row5[0]?></td>
    							<td align=center valign=middle>Vacant -<?php echo $row6[0]?></td>
							</tr>
  							<tr>
   							  <td align=center valign=middle>Unassigned to bed -<?php echo $row7[0]?></td>
    							<td align=center valign=middle>&nbsp;</td>
							</tr>
					
				  </table>
                        <br /><br />
                </div>
                <!-- // #main -->
 <?php
?>               