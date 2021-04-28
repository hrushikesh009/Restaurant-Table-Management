<?php
require 'Entity/TableEntity1.php';

class TableModel {
    
    function InsertTableRecord(TableEntity $table)
    {
        require 'credentials.php';
        
    $query = sprintf("INSERT INTO orders(Title,FName,LName,Email,Menu,Phone,Tbltyp,Purpose)VALUES('%s','%s','%s','%s','%s','%s','%s','%s')",
                mysqli_real_escape_string($conn,$table->Title),
                mysqli_real_escape_string($conn,$table->FName),
                mysqli_real_escape_string($conn,$table->LName),
                mysqli_real_escape_string($conn,$table->Email),
                mysqli_real_escape_string($conn,$table->Menu),
                mysqli_real_escape_string($conn,$table->Phone),
                mysqli_real_escape_string($conn,$table->Tbltyp),
                mysqli_real_escape_string($conn,$table->Purpose));
                
        if (mysqli_query($conn,$query))
        {
            echo "<script type='text/javascript'> alert('Your Booking application has been sent')</script>";
            mysqli_close($conn);
        }
        else
        {
            echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
        }
    }
}


