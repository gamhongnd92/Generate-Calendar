<?php
    require("inc/html.inc.php");
    require("inc/calendar.inc.php");
    require("inc/validation.inc.php");

   //Check to see if there was information posted via the server
if ($_SERVER["REQUEST_METHOD"] == "POST")	{

	$month = (int)$_POST["month"];
	$year = (int)$_POST["year"];
    $eventDate = $_POST["eventDate"];
	//Looks like someone posted data
	//Validate it
	$errors = validate_CalendarForm();
	
	//If there are no errors...
	if (empty($errors))	{
		//Get the calendar data and print it

		$data = getCalendarData($month, $year);
        html_Calendar($data);
	} else {
		//Otherwise print the errors
		html_errors($errors);
		//And present the form.
		html_CalendarForm();
	}
} else {
	//Or if there was no POST data it means the user hasnt submitted anything, just pint the calendar form.
	html_CalendarForm();
}

?>