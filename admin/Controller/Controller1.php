<?php
require 'Model/TableModel1.php';

class Controller {
    
    function InsertTableRecord()
    {   
        $title = $_POST["title"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $Menu = $_POST["menu"];
        $phone = $_POST["phone"];
        $tble = $_POST["table"];
        $purpose = $_POST["purpose"];
        
        
        
        $table = new TableEntity(-1,$title, $fname, $lname, $email, $Menu, $phone, $tble, $purpose);
        $tableModel = new TableModel();
        $tableModel->InsertTableRecord($table);
    }
    function CheckCode()
    {
        require '../credentials.php';
        
        //Check if the code is valid or not.
        $codel = $_POST["cde"];
        $code = $_POST["cd"];
        $email = $_POST["email"];
        if($codel == "$code")
        {
            
            $query = "SELECT * from orders where email = $email";
            $result = mysqli_query($conn,$query);
            $data = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($data[0]) > 1)
            {
                echo "<script type='text/javascript'> alert('User already in existence')</script>";
            }
            else
            {
                $controller = new Controller();
                $controller->InsertTableRecord();
            }
        }
        else 
        {
            echo "<script type='text/javascript'> alert('Entered code is invalid')</script>";
        }
    }
     function AvailableTables()
    {
        require '../credentials.php';
        
        
        $querys = "SELECT * FROM orders";
        $result = mysqli_query($conn,$querys) or die(mysql_error());
        while ($row = mysqli_fetch_array($result))
        {
            $id = $row["Tbltyp"];
            if ($id == "Table for 2")
            {
                echo "<div class='col-md-3 col-sm-12 col-xs-12'>
                        <div class='panel panel-primary text-center no-boder bg-color-blue'>
                            <div class='panel-body'>
                                <i class='fa fa-users fa-5x'></i>
                                <h3>" . $row["Purpose"] . "</h3>
                            </div>
                            <div class='panel-footer back-footer-blue'>
                                " . $row["Tbltyp"] . "
                            </div>
                            <div class='panel-footer back-footer-blue'>
                                Table ID: " . $row["cid"] . "
                            </div>
                            <div class='panel-footer back-footer-blue'>
                                " . $row["Menu"] . "
                            </div>
                        </div>
                      </div>";
            }
            else if ($id == "Table for 3")
            {
                 echo "<div class='col-md-3 col-sm-12 col-xs-12'>
                        <div class='panel panel-primary text-center no-boder bg-color-green'>
                            <div class='panel-body'>
                                <i class='fa fa-users fa-5x'></i>
                                <h3>" . $row["Purpose"] . "</h3>
                            </div>
                            <div class='panel-footer back-footer-green'>
                               " . $row["Tbltyp"] . "
                            </div>
                            <div class='panel-footer back-footer-green'>
                               Table ID: " . $row["cid"] . "
                            </div>
                            <div class='panel-footer back-footer-green'>
                               " . $row["Menu"] . "
                            </div>
                        </div>
                      </div>";
            }
            else if ($id == "Table for 4")
            {
                echo "<div class='col-md-3 col-sm-12 col-xs-12'>
                        <div class='panel panel-primary text-center no-boder bg-color-brown'>
                            <div class='panel-body'>
                                <i class='fa fa-users fa-5x'></i>
                                <h3>" . $row["Purpose"] . "</h3>
                            </div>
                            <div class='panel-footer back-footer-brown'>
                                " . $row["Tbltyp"] . "
                                
                            </div>
                            <div class='panel-footer back-footer-brown'>
                                Table ID: " . $row["cid"] . "
                                
                            </div>
                            <div class='panel-footer back-footer-brown'>
                                " . $row["Menu"] . "
                            </div>
                        </div>
                     </div>";
            }
            else if ($id == "Table for 5")
            {
                echo "<div class='col-md-3 col-sm-12 col-xs-12'>
                        <div class='panel panel-primary text-center no-boder bg-color-red'>
                            <div class='panel-body'>
                               <i class='fa fa-users fa-5x'></i>
                               <h3>" . $row["Purpose"] . "</h3>
                            </div>
                            <div class='panel-footer back-footer-red'>
                                " . $row["Tbltyp"] . "
                            </div>
                            <div class='panel-footer back-footer-red'>
                               Table ID: "  . $row["cid"] . "
                            </div>
                            
                            <div class='panel-footer back-footer-red'>
                                " . $row["Menu"] . "
                            </div>
                        </div>
                      </div>";
            }
            else if ($id == "Table for 6")
            {
                echo "<div class='col-md-3 col-sm-12 col-xs-12'>
                        <div class='panel panel-primary text-center no-boder bg-color-red'>
                            <div class='panel-body'>
                               <i class='fa fa-users fa-5x'></i>
                               <h3>" . $row["Purpose"] . "</h3>
                            </div>
                            <div class='panel-footer back-footer-red'>
                                " . $row["Tbltyp"] . "
                            </div>
                            <div class='panel-footer back-footer-red'>
                                Table ID: " . $row["cid"] . "
                            </div>
                            <div class='panel-footer back-footer-red'>
                                " . $row["Menu"] . "
                            </div>
                        </div>
                      </div>";
            }
        }
    }

}
?>
   