<?php
	require_once('header.php');
	require_once('connect.php');
	$error="";
?>   
        <div id="containerHolder">
			<div id="container">
        		
                
                <!-- h2 stays for breadcrumbs -->
                
                
                <div id="main">
                <form method="post" class="jNice" name="frm1">
                    <?php
						if(isset($_POST['save']))
						{
							$uname=$_POST['uname'];
							$pword=$_POST['pword'];
							
							if($uname==""){ $error="<br><span class=error>Please enter a username</span><br><br>"; }
							elseif($pword==""){ $error="<br><span class=error>Please enter the password</span><br><br>"; }
							else
							{
								$result=mysqli_query($server,"SELECT * FROM users WHERE uname='$uname' AND pword='$pword'");
								if(mysqli_num_rows($result)==0){ $error="<br><span class=error>Invalid Username/Password</span><br><br>"; }
								else
								{
									$row=mysqli_fetch_array($result);
									session_start();
									$_SESSION['user_id']=$row['user_id'];
									$_SESSION['name']=$row['name'];
									Redirect('dashboard.php'); 
								}
							}
							if($error!=""){ echo $error; }
						}
					?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-color: white;
  min-height: 380px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
body{
	background-image: url(login.jpeg);
	background-size: cover;
}
h1{
	background-color: white;
	width: 100%;
}
</style>
</head>
<body>

<div class="bg-img" style="margin-left: 981px;">
  <form action="/action_page.php" class="container">
    <h1>Login</h1>

    <label for="email"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pword" required>

    <button type="submit" value="Log In" name="save"  class="btn">Login</button>
  </form>
</div>


</body>
</html>
                    	
                        
                <!-- // #main -->
 <?php
	
?>               
