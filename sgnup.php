<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db ($conn,'restaurant');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign up</title>
<link href="sgnup.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <style>
    #msg {
    visibility: hidden;
    min-width: 250px;
    background-color:yellow;
    color: #000;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    right: 30%;
    top: 30px;
    font-size: 17px;
	margin-right:30px;
}

#msg.show {
    visibility: visible;
    -webkit-animation: fadein 5s, fadeout 5s 5s;
    animation: fadein 5s, fadeout 5s 5s;
}

@-webkit-keyframes fadein {
    from {top: 0; opacity: 0;} 
    to {top: 30px; opacity: 1;}
}

@keyframes fadein {
    from {top: 0; opacity: 0;}
    to {top: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {top: 30px; opacity: 1;} 
    to {top: 0; opacity: 0;}
}

@keyframes fadeout {
    from {top: 30px; opacity: 1;}
    to {top: 0; opacity: 0;}
}
    </style>
</head>

<body>
<div class="signup">
    <form action="sgnup.php" method="post">
    <h2 style="color: #fff;">Sign Up</h2>
    <input type="text" name="username" placeholder="Username" required/><br><br>
    <input type="password" name="password" placeholder="Password"required/><br><br>    
    <input type="password" name="cpassword" placeholder="Confirm Password"required/><br><br>   
    <input type="submit" name="signuptype" value="Sign up" onclick="myFunction()"><br><br>
        <div id="msg">Congratulations You Sign Up successfully!!</div>
        <script>
         function myFunction() {
         var x = document.getElementById("msg");
         x.className = "show";
         setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
         }
         </script>

  Already have account?<a href="logn.php" style="text-decoration: none; font-family: 'Play', sans-serif; color: yellow;">&nbsp;Log In</a>
    </form>    
</div>
</body>
</html>
<?php
if(isset($_POST['signuptype']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "select * from user where username='$username'";
					//echo $query;
				$query_run = mysqli_query($conn,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query= "insert into user(username,password) values ('$username','$password')";
							$query_run = mysqli_query($conn,$query);
							if($query_run)
							{
							     echo '<script type="text/javascript">alert("Registration successful")</script>';  
							}
							else
							{
								echo '<script type="text/javascript">alert(Registration Unsuccessful due to server error")</script>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
?>
