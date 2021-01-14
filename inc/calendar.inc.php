<?php
//This function will return a datastructure indicating the entrires for each day, the current day, the start of the month as well as end of the month in a single array.  This information will be passed to an html function
function getCalendarData($month = 02,$year = 2020 )	{

$calendarData = array();

//Create a timestamp based on the parameters for getCalendarData
$cMonth = (int)$month;
$cYear = (int)$year;
$ts = mktime(0,0,0,$cMonth,1,$cYear);
$dayOfMonth = date("t",$ts);
$thisDate = getdate($ts);

//Important Days
$importantDay = $_POST["eventDate"];
$description = $_POST["description"];
$color = $_POST["color"];
//First Day of the Month 
$startDay = $thisDate['wday'];
//Last Day of the Month
$lastday = $dayOfMonth + $startDay;

//Append the current month and year to the array
$calendarData["month"] = date('F',$ts);
$calendarData["year"] = date('Y',$ts);
$calendarData["importantDay"] = $importantDay;
$calendarData["description"] = $description;
$calendarData["color"] = $color;
$calendarData["startDay"] = $startDay;
$calendarData["dayOfMonth"] = $dayOfMonth;

return $calendarData;

}
?>