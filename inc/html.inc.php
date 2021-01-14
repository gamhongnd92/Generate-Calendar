 <?php


function html_calendarForm() { ?>
<h1>Lap 03 - HTML Calendar - TTr-84929</h1>
<hr>
<form method="POST" action="">
    <table>
        <tr>
            <td>Month: </td>
            <td>
                <select name="month">
                    <?php
                         for ($i = 1; $i <= 12; $i++)
                            {
                                $month_name = date('F', mktime(0, 0, 0, $i, 1, 2010));
                                echo "<option value=".$i.">$month_name</option>";
                            }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Year </td>
            <td>
                <select name="year">
                    <?php
                         for ($i = 2020; $i <=2030 ; $i++)
                            {                                
                                echo "<option value=".$i.">$i</option>";
                            }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <input type="checkbox" name="check">Marked special event day
            </td>
        </tr>
        <tr>
            <td colspan="2">
            Special event day
            <input type="text" name="eventDate" size="2">
            </td>
        </tr>
        <tr>
            <td colspan="2">
            Description <br>
            <textarea name="description"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            Please select a color <br>
            <select name="color">
                <option value="green">Green</option>
                <option value="blue">Blue</option>
                <option value="yellow">Yellow</option>
                
            </select>
            </td>
        </tr>
    </table>
    <input type="submit" value="Create Calendar">
</form>
<?php
}
//This function shows errors in a div using an unorder list
function html_errors($errors){ ?>
<div id="errors">
    <ul>
        <?php
        foreach($errors as $error)
        {
            echo "<li>.$error.</li>";
        }
        ?>
    </ul>
</div>
<?php
}

function html_Calendar($data)	{
	
	//Array containing the days of the week.
	$daysOfTheWeek = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	
	$colors = ["green"=>"#008000","blue"=>"#0000ff","yellow"=>"#ffff00"];

	//Begin calendar by printing the header
	echo '<TABLE WIDTH="80%" HEIGHT="60%" BORDER=1>';
	//Print the month and year of the Calendar (Title in the top)
	echo '<TR><TD COLSPAN=7><H1>'.$data["year"].' - '.$data["month"].' - Lab03_TTR_84929</H1></TD></TR>';
	echo '<TR>';
    //Go through all the days of the week.
    
    foreach($daysOfTheWeek as $day)
    {
        echo '<TD>'.$day.'</TD>';
    }
    
    $dayOfMonth = $data["dayOfMonth"];
    $startDay = $data["startDay"];
    
    // set counter start at 1
    $counter = 1;

    echo '</TR>';

    //Iterate through the array and print out the boxes
    for($i = 0; $i < 6; $i++){
        // row here
        echo '</TR>';
        for($j=0; $j<7; $j++){
            if($i==0){
                if($j < $startDay){
                    // Print nothing
                    echo '<TD BGCOLOR="#DDD"></TD>';
                }
                else if($counter==$data["importantDay"])
                {
                   echo '<TD BGCOLOR="'.$colors[$data["color"]].'">'.$counter."-".$data["description"].'</TD>';
                   $counter++;
                }
                else if($j >= $startDay && $counter!=$data["importantDay"]){
                    echo '<TD >'.$counter.'</TD>';
                    $counter++;
                }
            } else {

                if($counter <= $dayOfMonth && $counter!=$data["importantDay"] ){
                    echo '<TD>'.$counter.'</TD>';
                    $counter++;
                }
                else if($counter==$data["importantDay"])
                {
                   echo '<TD BGCOLOR="'.$colors[$data["color"]].'">'.$counter."-".$data["description"].'</TD>';
                   $counter++;
                }
                else {
                    echo '<TD BGCOLOR="#DDD"></TD>';
                }
            }      
            
        }
        echo '</TR>';
    }
    echo '</TABLE>';
        

	
			
		
		
			
	

	
}


?>