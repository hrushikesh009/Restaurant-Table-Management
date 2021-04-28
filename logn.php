<?php
	session_start();
	require_once('credentials.php');
	//phpinfo();
?>	
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orders login</title>
<link href="logn.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
</head>

<body>
   <div class="signin">

<form action="logn.php" method="post">
<h2 style="color:#fff;">Log In</h2>
<input type="text" name="username" placeholder="Username" required/><br /><br />
<input type="password" name="password" placeholder="Password" required /><br /><br />
<input type="submit" name="login" value="Log In" /><br /><br />
<div id="container">
<a href="re.html" style=" margin-right:0px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Reset password?</a>
<a href="for.html" style=" margin-left:30px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Forget password</a>
    </div><br /><br /><br /><br /><br /><br />
Don't have account?<a href="sgnup.php" style="font-family:'Play', sans-serif;">&nbsp;Sign Up</a>

</form>
<?php
if(isset($_POST['login']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				
				$query = "select * from user WHERE username='$username' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($conn,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header("Location: admin/orders.php");
					}
					else
					{
						echo'<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
						
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
					
				}
			}
			else
			{
			}
		?>
</div>		
</body>
</html>

