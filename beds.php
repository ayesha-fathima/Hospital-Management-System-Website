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
<style>
     body{
    background-image: url("bg.jpeg");
    background-repeat: no-repeat;
    width: 100%;
    background-size: cover;
  }
  td{
    border:2px solid black;
    border-width: 2px;

  }
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
                    	<a href="beds.php" class="active" style="color: black; text-decoration: none;"><button>View All Beds</button></a>
                    	<a href="add-bed.php" style="color: black; text-decoration: none;"><button>Add New Bed</button></a>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
 
</div>
                <!-- h2 stays for breadcrumbs -->
               
                    	<table  style="left: 450px;
    position: absolute;
    bottom: 64px;
    width: 460px;">
							<tr>
                                <td style="border-width: 2px;"><b>Bed ID</b></td>
                                <td style="border-width: 2px;"><b>Type</b></td>
                                <td style="border-width: 2px;"><b>Ward</b></td>
                            </tr> 
                            <?php
								$result=mysqli_query($server,"SELECT * FROM beds ORDER BY bed_id DESC");
								while($row=mysqli_fetch_assoc($result))
								{?>
									<tr class=odd>
                                	<td style="border-width: 2px;"><?php echo "$row[bed_id]" ?></td>
                                	<td style="border-width: 2px;"><?php echo "$row[type]" ?></td>
                                	<td style="border-width: 2px;"><?php echo "$row[ward]" ?></td>
                            		</tr><?php
								}
							?>                       
                        </table>
                        <br /><br />
                </div>
                <!-- // #main -->
 <?php
	
?>               