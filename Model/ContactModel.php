<?php
require 'Entity/ContactEntity.php';

class ContactModel {
    
    function InsertContact(ContactEntity $contact)
    {
        require 'credentials.php';
        
        $query = sprintf("INSERT INTO `contact`(fullname, phoneno, email,approval)VALUES('%s','%s','%s','%s')",
                mysqli_real_escape_string($conn,$contact->fullname),
                mysqli_real_escape_string($conn,$contact->phoneno),
                mysqli_real_escape_string($conn,$contact->email),
                mysqli_real_escape_string($conn,$contact->approval));
        if(mysqli_query($conn,$query))
        {
            echo "<script type='text/javascript'> alert('Newsletter subscription request sent')</script>";
            mysqli_close($conn);
        }
        else
        {
            echo "<script type='text/javascript'> alert('Something might not right')</script>";
        }
    }
}
