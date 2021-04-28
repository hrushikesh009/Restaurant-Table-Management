<?php

require 'credentials.php';
        
        
        
        $id = $_GET["eid"];
        $query = sprintf("DELETE FROM kitchen WHERE id = $id");
        if(mysqli_query($conn,$query))
        {
            echo' <script language="javascript" type="text/javascript"> alert("Deleted") </script>';
            mysqli_close($conn);
        }
        echo '<meta http-equiv="refresh" content="1; URL=usersettings1.php" />';
?>

