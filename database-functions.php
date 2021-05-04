<?

// This file contains one function to generate a table of information of data

// output a table of results, including a checkbox if $includeCheckbox is true
// receive the appointments as a database object into $allAppts
function outputApptResults($allAppts, $includeCheckbox = false) {
	
	$counter = 0;
	$output = "";
	$output .= "<table cellpadding='10'>\n";
	
	// loop through $allAppts with each $row available as $appt
	foreach ($allAppts as $appt) {
		
		$counter++;
		
		$output .= "\t<tr style='background-color: #ddd;'>\n";
		
		if ($includeCheckbox) {
			$checkboxID = "appt[" . $counter . "]";
			$checkboxValue = $appt["id"];
			$output .= "\t\t<td><input type='checkbox' id='$checkboxID' name='$checkboxID' value='$checkboxValue'></td>\n";
		}
		$output .= "\t\t<td>" . $appt["appt"] . "</td>\n";
		$output .= "\t\t<td>" . $appt["patient_name"] . "</td>\n";
		$output .= "\t\t<td>" . $appt["patient_complaint"] . "</td>\n";
		$output .= "\t\t<td>" . $appt["physician_name"] . "</td>\n";
		
		$output .= "\t</tr>\n";
	}
	$output .= "</table>";
	
	// if there is at least 1 record, output the button
	if ($counter > 0) $output .= '<button type="submit">Delete Checked Records</button>';
	
	return $output;
}