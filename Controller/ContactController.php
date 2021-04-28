<?php
require_once 'Model\ContactModel.php'; 

class ContactController {
    
    function InsertContact()
    {
        $fullname = $_POST["name"];
        $phoneno = $_POST["phone"];
        $email = $_POST["mail"];
        $approval = "Not Allowed";
        
        $contact = new ContactEntity(-1,$fullname,$phoneno,$email,$approval);
        $contactModel = new ContactModel();
        $contactModel->InsertContact($contact);
    }
}
