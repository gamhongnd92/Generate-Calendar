<?php
 function validate_CalendarForm() 
{
    $errors = array();
    // check the month was selected
    if(empty($_POST["month"]) || !isset($_POST["month"]))
    {
        $errors[] = "Please enter a valid month";
    }
    
    // check the year was selected
    if(empty($_POST["year"]) || !isset($_POST["year"]))
    {
        $errors[] = "Please enter a valid year";
    }
     //Check if the checkbox was selected
     if (isset($_POST["check"]) && $_POST["check"] != ""){
        //Check the Day is within the month
        $month = $_POST["month"];
        $year = $_POST["year"];
        $eventDate = $_POST["eventDate"];
        $daysOfMonth = 0;
        if($month=="January" || $month == "March" || $month == "May" || $month == "July" || $month == "August" || $month == "October" || $month == "December")
        {
            $daysOfMonth = 31;
        }
        else if($month == "February" || $month == "April" || $month == "September" || $month == "November"  )
        {
            $daysOfMonth = 30;
        }
        else
        {
           if($year%4 == 0 || ($year % 400 == 0 && $year % 100 !=0))
           {
                $daysOfMonth = 29;
           } 
           else {
               $daysOfMonth = 28;
           }
        }
        if($eventDate>$daysOfMonth)
        {
            $errors[] = "Please enter a valid day for the month you have selected";
        }
        if(empty($_POST["eventDate"]) && !is_numeric($_POST["eventDate"])) {
            $errors[] = "Please enter a day for your special event.";
        }
        
        //Check the Description was entered
        if (empty($_POST["description"]) && !is_string($_POST["description"])) {
            $errors[] = "Please enter a description";
        }
        //Check a color was selected
        if (empty($_POST["color"]) || !isset($_POST["color"]))  {
            $errors[] = "Please select a color";
        }
    }

    return $errors;
    
}
    

?>