<?php
session_start();
if (isset($_SESSION["user"])) {
    header("location:settings1.php");
}
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>The Kitchen : ADMIN</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div id="clouds">
            <div class="cloud x1"></div>
            <!-- Time for multiple clouds to dance around -->
            <div class="cloud x2"></div>
            <div class="cloud x3"></div>
            <div class="cloud x4"></div>
            <div class="cloud x5"></div>
        </div>
        <div class="container">
            <div id="login">
                <form method="post">
                    <fieldset class="clearfix">
                        <p><span class="fontawesome-user"></span><input type="text"  name="user" value="Username" onBlur="if (this.value == '')
                                    this.value = 'Username'" onFocus="if (this.value == 'Username')
                                                this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                        <p><span class="fontawesome-lock"></span><input type="password" name="pass"  value="Password" onBlur="if (this.value == '')
                                    this.value = 'Password'" onFocus="if (this.value == 'Password')
                                                this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
                        <p><input type="submit" name="sub"  value="Login"></p>
                    </fieldset>
                </form>
            </div> <!-- end login -->
        </div>
        <div class="bottom">  <h3><a href="../index.php">Admin Panel Homepage</a></h3></div>
<?php

require_once('credentials.php');
if(isset($_POST['sub']))
            {
                $username=$_POST['user'];
                $password=$_POST['pass'];
                
                $query = "select * from kitchen WHERE uname='$username' and pass='$password' ";
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
                    
                    header("Location: settings1.php");
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
    </body>
</html>

