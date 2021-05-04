<?

// This file contains one function to generate a table of information of data

// output a table of results, including a checkbox if $includeCheckbox is true
// receive the appointments as a database object into $allAppts
function outputSitResults($allSit, $includeCheckbox = false) {
	
	$counter = 0;
	$output = "";
	$output .= "<table cellpadding='10'>\n";
	
	// loop through $allAppts with each $row available as $appt
	foreach ($allSit as $sit) {
		
		$counter++;
		
		$output .= "\t<tr style='background-color: #ddd;'>\n";
		
		if ($includeCheckbox) {
			$checkboxID = "situation[" . $counter . "]";
			$checkboxValue = $sit["id"];
			$output .= "\t\t<td><input type='checkbox' id='$checkboxID' name='$checkboxID' value='$checkboxValue'></td>\n";
		}
		$output .= "\t\t<td>" . $sit["situation"] . "</td>\n";
		$output .= "\t\t<td>" . $sit["question"] . "</td>\n";
		$output .= "\t\t<td>" . $sit["1option"] . "</td>\n";
		$output .= "\t\t<td>" . $sit["2option"] . "</td>\n";
    $output .= "\t\t<td>" . $sit["3option"] . "</td>\n";
		$output .= "\t\t<td>" . $sit["file_name"] . "</td>\n";
		
		$output .= "\t</tr>\n";
	}
	$output .= "</table>";
	
	// if there is at least 1 record, output the button
	if ($counter > 0) $output .= '<button type="submit">Delete Checked Rows</button>';
	
	return $output;
}