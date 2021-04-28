<?php
require 'Entity/NewsLetterEntity.php';

class NewsLetterModel {
    
    function InsertNewsLetters(NewsLetterEntity $news)
    {
        require 'credentials.php';
        
        
        $query = sprintf("INSERT INTO newsletterlog(title,subject,news)VALUES('%s','%s','%s')",
                mysqli_real_escape_string($conn,$news->title),
                mysqli_real_escape_string($conn,$news->subject),
                mysqli_real_escape_string($conn,$news->news));
        if(mysqli_query($conn,$query))
        {
            echo "<script type='text/javascript'> alert('NewsLetter has been sent')</script>";
            mysqli_close($conn);
        }
        else
        {
            echo "<script type='text/javascript'> alert('Something might not right')</script>";
        }
    }
}
