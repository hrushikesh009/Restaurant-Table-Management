<?php
require 'Entity/TableEntity.php';

class TableModel {
    
    function InsertTableRecord(TableEntity $table)
    {
        require 'credentials.php';
        
        $query = sprintf("INSERT INTO tablebook(Title,FName,LName,Email,National,Country,Phone,Tbltyp,Purpose,Meal,time,date,status)VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
                mysqli_real_escape_string($conn,$table->Title),
                mysqli_real_escape_string($conn,$table->FName),
                mysqli_real_escape_string($conn,$table->LName),
                mysqli_real_escape_string($conn,$table->Email),
                mysqli_real_escape_string($conn,$table->National),
                mysqli_real_escape_string($conn,$table->Country),
                mysqli_real_escape_string($conn,$table->Phone),
                mysqli_real_escape_string($conn,$table->Tbltyp),
                mysqli_real_escape_string($conn,$table->Purpose),
                mysqli_real_escape_string($conn,$table->Meal),
                mysqli_real_escape_string($conn,$table->time),
                mysqli_real_escape_string($conn,$table->date),
                mysqli_real_escape_string($conn,$table->status));
        if(mysqli_query($conn,$query))
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
