<?php


class TableEntity {
    
    public $id;
    public $Title;
    public $FName;
    public $LName;
    public $Email;
    public $Menu;
    public $Phone;
    public $Tbltyp;
    public $Purpose;
    
    
    
    function __construct($id, $Title, $FName, $LName, $Email, $Menu, $Phone, $Tbltyp, $Purpose) {
        $this->id = $id;
        $this->Title = $Title;
        $this->FName = $FName;
        $this->LName = $LName;
        $this->Email = $Email;
        $this->Menu = $Menu;
        $this->Phone = $Phone;
        $this->Tbltyp = $Tbltyp;
        $this->Purpose = $Purpose;
        
        
    }

}
?>